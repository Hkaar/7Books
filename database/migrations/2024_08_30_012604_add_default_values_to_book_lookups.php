<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('library_books', function (Blueprint $table) {
            $table->integer('stock')->default(0)->change();
        });

        Schema::table('region_books', function (Blueprint $table) {
            $table->integer('stock')->default(0)->change();
        });
    }

    public function down(): void
    {
        //
    }
};
