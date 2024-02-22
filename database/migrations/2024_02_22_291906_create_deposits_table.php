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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->string('customer_name');
            $table->string('code');
            $table->decimal('amount', $total = 10, $places = 2);

            // One to One on System User Model (default -->>User Model<<--)
            $table->bigInteger('system_user')->unsigned();
            $table->foreign('system_user')->references('id')->on('users')->onDelete('cascade')->nullable();
            
            $table->enum('status', ['Completed', 'Incompleted'])->default('Completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
