<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('article_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained('articles')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->text('content');
            $table->foreignId('content_type_id')->constrained('content_types')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_contents');
    }
};
