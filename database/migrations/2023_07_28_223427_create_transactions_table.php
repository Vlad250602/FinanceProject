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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->enum('type', ['income', 'expense', 'between_acc'])->nullable(false);

            $table->unsignedBigInteger('account_id')->nullable(false);
            $table->decimal('count', 10,2)->default(0);
            $table->enum('currency', ['UAH', 'USD', 'EUR'])->nullable(false);

            $table->unsignedBigInteger('account_id2')->nullable(true)->default(null);
            $table->decimal('count2', 10,2)->default(0);
            $table->enum('currency2', ['UAH', 'USD', 'EUR'])->nullable(true)->default(null);

            $table->text('description')->nullable(true);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('account_id2')->references('id')->on('accounts');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
