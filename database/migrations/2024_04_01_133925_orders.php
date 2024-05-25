<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("orders", function(Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users");
            $table->string("token");
            $table->dateTime("placed")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime("return_date");
            $table->string("status")->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("orders");
    }
};
