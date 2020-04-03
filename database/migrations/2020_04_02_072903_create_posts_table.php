<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->string('post_img');     
            $table->integer('upvotes')->default(0);
            $table->integer('downvotes')->default(0);
            $table->timestamps();
            $table->string('author');
            $table->foreignId('tag_id')->references('id')->on('tags');
            $table->foreignId('cat_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
