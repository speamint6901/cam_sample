<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrlsToGears extends Migration
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
            $table->text('amazon_url')->nullable();
            $table->text('yahoo_url')->nullable();
            $table->text('rakuten_url')->nullable();
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
            $table->dropcolumn('amazon_url');
            $table->dropcolumn('yahoo_url');
            $table->dropcolumn('rakuten_url');
        });
    }
}
