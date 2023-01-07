<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgerEntriesTable extends Migration
{
  
    public function up()
    {
        Schema::create('ledger_entries', function (Blueprint $table) {
            $table->id();

            $table->string('transaction_no')->nullable();
            $table->string('job_no')->nullable();
            $table->string('job_name')->nullable();
            $table->string('ledger_category_id')->nullable();
            $table->string('client_id')->nullable();
            $table->string('ledger_head_id')->nullable();
            $table->string('ledger_type')->nullable();
            $table->string('payment_against_bill')->nullable();
            $table->string('bill_id')->nullable();
            $table->string('ledger_date')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('ledger_head_bill_id')->nullable();
            $table->string('bill_amount')->nullable();
            $table->string('client_id')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('income_paid_amount')->nullable();
            $table->string('expense_paid_amount')->nullable();
            $table->string('remarks')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('ledger_entries');
    }
}
