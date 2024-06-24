<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anime_movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('genre_id')->constrained('genres')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('description');
            $table->string('status');
            $table->string('video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime_movies');
    }
};
