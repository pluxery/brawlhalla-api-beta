<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legends', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedBigInteger("first_weapon_id");
            $table->unsignedBigInteger("second_weapon_id");
            $table->foreign("first_weapon_id", "legend_weapon1_fk")->on("weapons")->references("id");
            $table->foreign("second_weapon_id", "legend_weapon2_fk")->on("weapons")->references("id");
            $table->text("history")->nullable();
            $table->string("image");

            $table->integer("attack");
            $table->integer("dexterity");
            $table->integer("defend");
            $table->integer("speed");

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
        Schema::dropIfExists('legends');
    }
}
