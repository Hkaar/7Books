<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('book_authors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained('books');
            $table->foreignId('author_id')->constrained('authors');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_authors');
    }
};
