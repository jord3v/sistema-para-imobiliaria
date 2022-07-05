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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['published', 'unpublished', 'review'])->nullable()->default('unpublished');//
            $table->enum('featured', ['yes', 'no'])->default('no');	//
            $table->string('code');
            $table->longText('description');
            $table->json('measures')->nullable();
            $table->json('transactions')->nullable();
            $table->json('composition')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('purpose_id')->constrained();
            $table->foreignId('type_id')->constrained();
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
        Schema::dropIfExists('properties');
    }
};
