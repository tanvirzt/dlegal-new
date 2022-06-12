<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalCasesBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_cases_billings', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('bill_date')->nullable();
            $table->string('bill_for_the_date')->nullable();
            $table->string('bill_particulars_id')->nullable();
            $table->string('bill_particulars')->nullable();
            $table->integer('bill_type_id')->nullable();
            $table->string('bill_type')->nullable();
            $table->integer('bill_schedule_id')->nullable();
            $table->string('bill_amount')->nullable();
            $table->string('bill_submitted')->nullable();
            $table->string('payment_received')->nullable();
            $table->integer('payment_mode_id')->nullable();
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
        Schema::dropIfExists('criminal_cases_billings');
    }
}
