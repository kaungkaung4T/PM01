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
        Schema::create('deposit_notis', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->string('customer_name');
            $table->string('code');
            $table->decimal('amount', $total = 10, $places = 2);
            // One to One on System User Model (default -->>User Model<<--)
            $table->bigInteger('system_user')->unsigned()->nullable();
            $table->foreign('system_user')->nullable()->constrained()->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->enum('status', ['Completed', 'Pending'])->default('Completed');
            $table->string('remark')->nullable();
            $table->string('wallet')->nullable();
            $table->string('wallet1')->nullable(); // we use wallet as wallet1 in Deposit (not like DepositNoti)
            $table->string('wallet2')->nullable();
            $table->string('wallet3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposit_notis');
    }
};
