<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('libraries', function (Blueprint $table) {
            $table->text('desc')->change();
        });

        Schema::table('regions', function (Blueprint $table) {
            $table->text('desc')->change();
        });
    }

    public function down(): void
    {
        //
    }
};
