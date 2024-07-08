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
        Schema::table('transactions', function (Blueprint $table) {
            $table->renameColumn('currency_amount', 'send_currency_amount');
            $table->renameColumn('pay_amount', 'receive_currency_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->renameColumn('send_currency_amount', 'currency_amount');
            $table->renameColumn('receive_currency_amount', 'pay_amount');
        });
    }
};
