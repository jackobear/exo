<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSatellitesToPlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stars', function (Blueprint $table) {
            $table->string('satellites');
        });
        Schema::table('planets', function (Blueprint $table) {
            $table->string('satellites');
        });
        Schema::table('habitable_worlds', function (Blueprint $table) {
            $table->string('satellites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stars', function (Blueprint $table) {
            $table->dropColumn('satellites');
        });
        Schema::table('planets', function (Blueprint $table) {
            $table->dropColumn('satellites');
        });
        Schema::table('habitable_worlds', function (Blueprint $table) {
            $table->dropColumn('satellites');
        });
    }
}
