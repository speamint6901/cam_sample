<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAfImgToGears extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gears', function (Blueprint $table) {
            //
            $table->text('amazon_img')->nullable();
            $table->text('yahoo_img')->nullable();
            $table->text('rakuten_img')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gears', function (Blueprint $table) {
            //
            $table->dropcolumn('amazon_img');
            $table->dropcolumn('yahoo_img');
            $table->dropcolumn('rakuten_img');
        });
    }
}
