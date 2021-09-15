<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('travel_package_id')->constrained('travel_packages', 'id');
            $table->foreignId('user_id')->nullable()->constrained('users', 'id');
            $table->integer('addtional_visa');
            $table->integer('transaction_total');
            $table->enum('transaction_status', ['IN_CART', 'PENDING', 'SUCCESS', 'CANCEL', 'FAILED']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
