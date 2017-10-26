<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityStateZipCodeToAuctioneersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auctioneers', function (Blueprint $table) {
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auctioneers', function (Blueprint $table) {
            $table->dropColumn(['city', 'state', 'zip_code']);
        });
    }
}
