<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gears', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id');
            $table->integer('genre_id')->nullable();
            $table->string('name');
            $table->text('discription');
            $table->string('gear_image');
            $table->string('site_url')->nullable();
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
        Schema::dropIfExists('gears');
    }
}
