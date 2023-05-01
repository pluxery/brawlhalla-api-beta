<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id', 'post_tags_post_fk')->on('posts')->references('id')->onDelete('cascade');
            $table->index('post_id', 'post_tags_post_idx');


            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id', 'post_tags_tag_fk')->on('tags')->references('id');
            $table->index('tag_id', 'post_tags_tag_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_tags');
    }
}
