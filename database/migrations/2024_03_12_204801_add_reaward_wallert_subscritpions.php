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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->decimal('reward_wallet_1', $total = 10, $places = 2)->nullable();
            $table->decimal('reward_wallet_2', $total = 10, $places = 2)->nullable();
            $table->decimal('reward_wallet_3', $total = 10, $places = 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('reward_wallet_1');
            $table->dropColumn('reward_wallet_2');
            $table->dropColumn('reward_wallet_3');
        });
    }
};
