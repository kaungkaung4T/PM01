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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();

            // One to One on Customer Model
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->nullable()->constrained()->references('id')->on('customers')->onDelete('cascade');

            $table->string('bank_name');
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
