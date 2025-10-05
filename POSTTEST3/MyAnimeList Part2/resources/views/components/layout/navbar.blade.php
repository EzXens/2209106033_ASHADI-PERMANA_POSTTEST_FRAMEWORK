<div class="navbar bg-sky-500 text-white shadow-sm">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost text-white lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> 
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /> 
        </svg>
      </div>
      <ul tabindex="0"
          class="menu menu-sm dropdown-content bg-sky-500 text-white rounded-box z-1 mt-3 w-52 p-2 shadow">
        <li><a>Item 1</a></li>
        <li>
          <a>Parent</a>
          <ul class="p-2 bg-sky-600">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
          </ul>
        </li>
        <li><a>Item 3</a></li>
      </ul>
    </div>
    <a href="{{route('blog.index')}}" class="btn btn-ghost normal-case text-xl text-white hover:text-blue-800">AnimeList ~ My</a>
  </div>

  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="{{route('blog.index')}}" class="hover:bg-sky-600">Home</a></li>
      <li><a href="{{route('blog.animelist')}}" class="hover:bg-sky-600">Anime List</a></li>
      <li><a href="{{route('blog.index')}}" class="hover:bg-sky-600">About</a></li>
      <li><a href="{{route('blog.index')}}" class="hover:bg-sky-600">Contact</a></li>
    </ul>
  </div>

  <div class="navbar-end">
    <a class="btn bg-white text-sky-600 hover:bg-gray-200">Login</a>
  </div>
</div>
