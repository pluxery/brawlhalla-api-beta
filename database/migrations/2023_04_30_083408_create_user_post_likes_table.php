<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPostLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_post_likes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id', 'user_post_likes_post_fk')->on('posts')->references('id');
            $table->index('post_id', 'user_post_likes_post_idx');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_post_likes_user_fk')->on('users')->references('id');
            $table->index('user_id', 'user_post_likes_user_idx');

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
        Schema::dropIfExists('user_post_likes');
    }
}
