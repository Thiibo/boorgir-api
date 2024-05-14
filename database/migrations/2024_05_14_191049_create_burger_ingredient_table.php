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
        Schema::create('burger_ingredient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('burger_id')->unsigned();
            $table->unsignedBiginteger('ingredient_id')->unsigned();
            $table->foreign('burger_id')->references('id')->on('burgers');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('burger_ingredient');
    }
};
