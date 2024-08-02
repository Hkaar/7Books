<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('region_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained('books');
            $table->foreignId('region_id')->constrained('regions');
            $table->integer('stock');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('region_books');
    }
};
