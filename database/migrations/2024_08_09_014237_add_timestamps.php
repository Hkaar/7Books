<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('libraries', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
