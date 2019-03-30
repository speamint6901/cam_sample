<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvgImageNameToGearProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gear_profiles', function (Blueprint $table) {
            $table->string('avg_image_name', 5)->default('0');
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
            $table->dropcolumn('avg_image_name');
        });
    }
}
