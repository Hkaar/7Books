<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('isbn10')->nullable()->unique()->change();
            $table->string('isbn13')->nullable()->unique();
        });
    }

    public function down(): void
    {
        //
    }
};
