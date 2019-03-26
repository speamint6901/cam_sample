<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeThanderAvgToGearProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gear_profiles', function (Blueprint $table) {
            $table->float('thander_avg')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gear_profiles', function (Blueprint $table) {
            $table->integer('thander_avg')->default(0)->change();
        });
    }
}
