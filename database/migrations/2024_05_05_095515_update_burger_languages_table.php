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
        Schema::table('burger_languages', function (Blueprint $table) {
            $table->string('lang')->after('burger_id')->before('name');
            $table->unique(['burger_id', 'lang']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('burger_languages', function (Blueprint $table) {
            $table->dropUnique(['burger_id', 'lang']);
            $table->dropColumn('lang');
        });
    }
};
