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
        Schema::create("libraries", function(Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("desc");
            $table->foreignId("region_id")->constrained("regions");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("libraries");
    }
};
