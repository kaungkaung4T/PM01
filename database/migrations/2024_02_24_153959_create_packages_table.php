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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('amount', $total = 10, $places = 2);
            $table->decimal('rate', $total = 10, $places = 2);
            $table->decimal('reward_wallet_1', $total = 10, $places = 2);
            $table->decimal('reward_wallet_2', $total = 10, $places = 2);
            $table->integer('days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
