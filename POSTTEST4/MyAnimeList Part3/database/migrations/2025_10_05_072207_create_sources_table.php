<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Tambahkan kolom source_id di tabel animes
        Schema::table('animes', function (Blueprint $table) {
            $table->foreignId('source_id')->nullable()->constrained('sources')->onDelete('set null');
        });
    }

    public function down(): void {
        Schema::table('animes', function (Blueprint $table) {
            $table->dropForeign(['source_id']);
            $table->dropColumn('source_id');
        });

        Schema::dropIfExists('sources');
    }
};
