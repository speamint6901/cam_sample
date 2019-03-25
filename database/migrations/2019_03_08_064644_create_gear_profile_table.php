<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGearProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gear_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gear_id');
            $table->integer('have_count')->default(0);
            $table->integer('want_count')->default(0);
            $table->integer('fav_count')->default(0);
            $table->integer('thander_avg')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('gear_profiles');
    }
}
