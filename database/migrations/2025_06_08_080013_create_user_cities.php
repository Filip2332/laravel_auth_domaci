<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCitiesTable extends Migration
{
    public function up(): void
    {
        Schema::create('user_cities', function (Blueprint $table) {
            $table->id();


            $table->foreignId('user_id')->constrained()->onDelete('cascade');


            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_cities');
    }
}
