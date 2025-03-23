<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('weather', function (Blueprint $table) {
            $table->dropColumn('city');

            $table->unsignedInteger('city_id')->nullable();

            $table->foreign('city_id')
                ->references('id')    // -> polje city_id iz tabele weather-
                ->on('cities');          //-je povezano sa poljem id iz tabele cities
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weather', function (Blueprint $table) {
            //
        });
    }
};
