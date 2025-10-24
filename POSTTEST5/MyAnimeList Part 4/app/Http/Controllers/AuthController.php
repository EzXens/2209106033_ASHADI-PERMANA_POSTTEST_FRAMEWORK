<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('profile.show');
        }

        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ]);

        $identifier = $credentials['login'];
        $remember = $request->boolean('remember');

        $field = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$field => $identifier, 'password' => $credentials['password']], $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('profile.show'));
        }

        return back()
            ->withInput($request->only('login', 'remember'))
            ->withErrors([
                'login' => __('auth.failed'),
            ]);
    }

    public function showRegisterForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('profile.show');
        }

        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:30', 'alpha_dash', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);

        $user = User::create([
            'name' => $data['username'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('profile.show');
    }

    public function showProfile(Request $request): View
    {
        return view('profile.index', [
            'user' => $request->user(),
        ]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:30', 'alpha_dash', 'unique:users,username,' . $user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'bio' => ['nullable', 'string', 'max:600'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'background' => ['nullable', 'image', 'max:4096'],
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');

            if ($user->avatar_path) {
                Storage::disk('public')->delete($user->avatar_path);
            }

            $validated['avatar_path'] = $avatarPath;
        }

        if ($request->hasFile('background')) {
            $backgroundPath = $request->file('background')->store('backgrounds', 'public');

            if ($user->background_path) {
                Storage::disk('public')->delete($user->background_path);
            }

            $validated['background_path'] = $backgroundPath;
        }

        $validated['name'] = $validated['username'];

        $user->update($validated);

        return redirect()->route('profile.show')->with('status', __('Profile updated successfully.'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
