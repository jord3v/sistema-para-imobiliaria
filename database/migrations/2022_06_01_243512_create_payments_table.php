<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->double('price', 8, 2);
            $table->date('due_date');
            $table->date('payment_date')->nullable();
            $table->enum('status', ['concluded', 'pending'])->default('pending');
            $table->enum('flow', ['inflow', 'outflow']);
            $table->foreignId('contract_id')->constrained();
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('payments');
    }
};
