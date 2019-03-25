<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGearUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gear_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gear_id');
            $table->integer('user_id');
            $table->string('type');
            $table->text('have_comment')->nullable();
            $table->tinyInteger('point')->nullable();
            $table->unique(['gear_id', 'user_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gear_users');
    }
}
