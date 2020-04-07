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
        // Schema::create('cats', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('cat_title');
        // });
        // Schema::create('tags', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('tag_title');
        // });
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cat_id');
            $table->string('title');
            $table->longText('content');
            $table->string('post_img');     
            $table->integer('upvotes')->default(0);
            $table->integer('downvotes')->default(0);
            $table->string('slug');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('cat_id')
                ->references('id')
                ->on('cats')
                ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cats');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('posts');
    }
}
