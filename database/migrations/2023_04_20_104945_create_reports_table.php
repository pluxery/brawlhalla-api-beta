<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'report_user_fk')->on('users')->references('id')
                ->onDelete('cascade');;
            $table->index('user_id', 'report_user_idx');


            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id', 'report_post_fk')->on('posts')->references('id')->onDelete('cascade');
            $table->index('post_id', 'report_post_idx');

            $table->text('text');
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
        Schema::dropIfExists('reports');
    }
}
