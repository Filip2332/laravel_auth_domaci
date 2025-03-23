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

            $table->unsignedBigInteger('city_id');

            $table->foreign('city_id')
                ->references('id') // -> pole city_id iz tabele weather je povezano sa poljem id iz tabele cities
                ->on('cities');
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
