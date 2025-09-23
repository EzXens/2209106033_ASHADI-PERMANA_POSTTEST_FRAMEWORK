<?php

// database/migrations/xxxx_xx_xx_create_animes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('japanese_title')->nullable();
            $table->string('image')->nullable();
            $table->float('score', 3, 2)->nullable();
            $table->string('status')->default('Ongoing'); // Ongoing/Completed
            $table->integer('total_episodes')->nullable();
            $table->string('duration')->nullable(); // "23 min", "45 min", etc
            $table->date('release_date')->nullable();
            $table->string('studio')->nullable();
            $table->string('genre')->nullable();
            $table->text('synopsis')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('animes');
    }
};
