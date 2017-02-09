<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTalbe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechat_article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('cover');
            $table->string('author');
            $table->text('content');
            $table->tinyInteger('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('wechat_article');
    }
}
