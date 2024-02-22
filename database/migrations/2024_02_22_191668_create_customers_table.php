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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            // One to One on System User Model (default -->>User Model<<--)
            $table->bigInteger('system_user')->unsigned();
            $table->foreign('system_user')->references('id')->on('users')->onDelete('cascade')->nullable();

            // One to One on Deposit Model
            $table->bigInteger('deposit_amount')->unsigned();
            $table->foreign('deposit_amount')->references('id')->on('deposits')->onDelete('cascade')->nullable();

            $table->string('username');
            $table->string('password');
            $table->string('nric');
            $table->string('name');
            $table->string('bank_type');
            $table->string('bank_number');
            $table->string('remark')->nullable();
            $table->string('parent_user')->nullable();
            $table->boolean('fake')->default(false);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
