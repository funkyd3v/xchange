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
        Schema::table('rates', function (Blueprint $table) {
            $table->dropForeign(['currency_id']);
            $table->renameColumn('sell_rate', 'sale_rate');
            $table->foreign('currency_id')->references('id')->on('currencies'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rates', function (Blueprint $table) {
            $table->dropForeign(['currency_id']);
            $table->renameColumn('sale_rate', 'sell_rate');
            $table->foreign('currency_id')->references('id')->on('currencies'); 
        });
    }
};
