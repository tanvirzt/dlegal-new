<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_billings', function (Blueprint $table) {
            $table->id();
            $table->integer('bill_type_id')->nullable();
            $table->string('payment_type')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('case_type')->nullable();
            $table->string('case_no')->nullable();
            $table->integer('panel_lawyer_id')->nullable();
            $table->string('bill_amount')->nullable();
            $table->string('date_of_billing')->nullable();
            $table->integer('bank_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('payment_amount')->nullable();
            $table->integer('digital_payment_type_id')->nullable();
            $table->string('is_approved')->nullable();  
            $table->integer('delete_status')->default(0);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('case_billings');
    }
}
