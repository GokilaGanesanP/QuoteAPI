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
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('quoteName');
            $table->string('customerName');
            $table->string('customerType');
            $table->string('serialNo');
            $table->string('planNo');
            $table->integer('warantyTerms');
            $table->integer('warantyHrs');
            $table->integer('customerId');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
