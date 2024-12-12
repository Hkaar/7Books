<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->primaryKey;
            $table->foreignId('user_id')->constrained('users');
            $table->string('token');
            $table->dateTime('placed_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('return_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
