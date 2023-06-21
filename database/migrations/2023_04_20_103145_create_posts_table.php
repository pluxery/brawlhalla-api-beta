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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'post_user_fk')->on('users')->references('id')
                ->onDelete('cascade');
            $table->index('user_id', 'post_user_idx');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'post_category_fk')->on('categories')->references('id');
            $table->index('category_id', 'post_category_idx');

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
        Schema::dropIfExists('posts');
    }
}
