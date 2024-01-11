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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('Invoice_number');
            $table->string('NIP_buyer');
            $table->string('NIP_seller');
            $table->string('Product_name');
            $table->float('Net_amount');
            $table->string('Currency');
            $table->date('Date_of_issue');
            $table->date('Date_of_edit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoces');
    }
};
