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
        Schema::create("order_items", function(Blueprint $table) {
            $table->id();
            $table->foreignId("order_id")->constrained("orders");
            $table->foreignId("book_id")->constrained("books");
            $table->foreignId("region_id")->constrained("regions");
            $table->integer("amount");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("order_items");
    }
};
