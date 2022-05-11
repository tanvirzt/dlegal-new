<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalCasesCaseStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_cases_case_steps', function (Blueprint $table) {
            $table->id();
            $table->integer('criminal_case_id')->nullable();
            $table->integer('case_infos_allegation_claim_id')->nullable();
            $table->string('case_infos_allegation_claim_write')->nullable();
            $table->mediumText('recovery_seizure_articles')->nullable();
            $table->string('amount_of_money')->nullable();
            $table->mediumText('another_claim')->nullable();
            $table->mediumText('summary_facts')->nullable();
            $table->mediumText('case_info_remarks')->nullable();
            $table->string('random_case_id')->nullable();
            $table->string('case_steps_filing')->nullable();
            $table->string('case_steps_filing_copy')->nullable();
            $table->string('case_steps_filing_yes_no')->nullable();
            $table->string('taking_cognizance')->nullable();
            $table->string('taking_cognizance_copy')->nullable();
            $table->string('taking_cognizance_yes_no')->nullable();
            $table->string('arrest_surrender_cw')->nullable();
            $table->string('arrest_surrender_cw_copy')->nullable();
            $table->string('arrest_surrender_cw_yes_no')->nullable();
            $table->string('case_steps_bail')->nullable();
            $table->string('case_steps_bail_copy')->nullable();
            $table->string('case_steps_bail_yes_no')->nullable();
            $table->string('case_steps_court_transfer')->nullable();
            $table->string('case_steps_court_transfer_copy')->nullable();
            $table->string('case_steps_court_transfer_yes_no')->nullable();
            $table->string('case_steps_charge_framed')->nullable();
            $table->string('case_steps_charge_framed_copy')->nullable();
            $table->string('case_steps_charge_framed_yes_no')->nullable();
            $table->string('case_steps_witness_from')->nullable();
            $table->string('case_steps_witness_from_copy')->nullable();
            $table->string('case_steps_witness_from_yes_no')->nullable();
            $table->string('case_steps_witness_to')->nullable();
            $table->string('case_steps_witness_to_copy')->nullable();
            $table->string('case_steps_witness_to_yes_no')->nullable();
            $table->string('case_steps_argument')->nullable();
            $table->string('case_steps_argument_copy')->nullable();
            $table->string('case_steps_argument_yes_no')->nullable();
            $table->string('case_steps_judgement_order')->nullable();
            $table->string('case_steps_judgement_order_copy')->nullable();
            $table->string('case_steps_judgement_order_yes_no')->nullable();
            $table->mediumText('case_steps_summary_judgement_order')->nullable();
            $table->mediumText('case_steps_remarks')->nullable();
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
        Schema::dropIfExists('criminal_cases_case_steps');
    }
}
