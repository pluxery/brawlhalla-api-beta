<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'subscriptions_user_fk')->on('users')->references('id')->onDelete('cascade');
            $table->index('user_id', 'subscriptions_user_idx');

            $table->unsignedBigInteger('subscription_id');
            $table->foreign('subscription_id', 'subscription_fk')->on('users')->references('id')->onDelete('cascade');
            $table->index('subscription_id', 'subscription_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
