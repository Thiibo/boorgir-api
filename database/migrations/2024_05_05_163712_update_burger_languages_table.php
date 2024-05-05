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
            $table->renameColumn('burger_id', 'item_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('burger_languages', function (Blueprint $table) {
            $table->renameColumn('item_id', 'burger_id');
        });
    }
};
