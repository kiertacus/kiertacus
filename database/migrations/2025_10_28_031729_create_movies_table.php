<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('rating');
            $table->text('review');
            $table->string('poster_url')->nullable();
            $table->string('genre')->nullable();
            $table->integer('release_year')->nullable();
            $table->timestamps(); // ✅ fixes the created_at error
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
