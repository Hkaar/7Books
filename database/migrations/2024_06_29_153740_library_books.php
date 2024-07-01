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
        Schema::create("library_books", function(Blueprint $table) {
            $table->id();
            $table->foreignId("library_id")->constrained("libraries");
            $table->foreignId("book_id")->constrained("books");
            $table->integer("stock");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("library_books");
    }
};
