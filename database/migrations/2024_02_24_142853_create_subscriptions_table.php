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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            // One to One on System User Model (default -->>User Model<<--)
            $table->bigInteger('customer')->unsigned()->nullable();
            $table->foreign('customer')->nullable()->constrained()->references('id')->on('customers')->onDelete('cascade')->nullable();
            
            $table->string('code');
            $table->decimal('amount', $total = 10, $places = 2);
            
            // One to One on System User Model (default -->>User Model<<--)
            $table->bigInteger('package')->unsigned()->nullable();
            $table->foreign('package')->nullable()->constrained()->references('id')->on('packages')->onDelete('cascade')->nullable();

            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
