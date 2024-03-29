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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->string('customer_name');
            $table->string('code');
            $table->decimal('amount', $total = 10, $places = 2);
            $table->string('remark')->nullable();

            $table->string('wallet')->nullable();
            $table->decimal('wallet1', $total = 10, $places = 2)->nullable();
            $table->decimal('wallet2', $total = 10, $places = 2)->nullable();
            $table->decimal('wallet3', $total = 10, $places = 2)->nullable();

            // One to One on System User Model (default -->>User Model<<--)
            $table->bigInteger('system_user')->unsigned()->nullable();
            $table->foreign('system_user')->nullable()->constrained()->references('id')->on('users')->onDelete('cascade')->nullable();

            // One to One on System User Model (default -->>User Model<<--)
            $table->bigInteger('completed_rejected_user')->unsigned()->nullable();
            $table->foreign('completed_rejected_user')->nullable()->constrained()->references('id')->on('users')->onDelete('cascade')->nullable();
            
            $table->timestamp('complete_date')->nullable();
            $table->timestamp('reject_date')->nullable();
            $table->enum('status', ['Completed', 'Pending', 'Rejected'])->default('Completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
