<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingLegendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_legends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('legend_id');
            $table->foreign('user_id', 'rating_legends_user_fk')->on('users')->references('id');
            $table->foreign('legend_id', 'rating_legends_legend_fk')->on('legends')->
            references('id')->onDelete('cascade');
            $table->index('user_id', 'rating_legends_user_idx');
            $table->index('legend_id', 'rating_legends_legend_idx');
            $table->unsignedInteger('rating');
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
        Schema::dropIfExists('rating_legends');
    }
}
