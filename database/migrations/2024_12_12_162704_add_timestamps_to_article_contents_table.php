<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToArticleContentsTable extends Migration
{
    public function up()
    {
        Schema::table('article_contents', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('article_contents', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
