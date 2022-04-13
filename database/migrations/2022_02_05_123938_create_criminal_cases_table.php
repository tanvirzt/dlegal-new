<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_cases', function (Blueprint $table) {
            $table->id();
            $table->string('client')->nullable();
            $table->string('legal_issue_id')->nullable();
            $table->string('legal_service_id')->nullable();
            $table->string('complainant_informant_name')->nullable();
            $table->string('accused_name')->nullable();
            $table->string('in_favour_of')->nullable();
            $table->string('case_no')->nullable();
            $table->string('name_of_the_court_id')->nullable();
            $table->string('next_date')->nullable();
            $table->string('next_date_fixed_id')->nullable();
            $table->string('received_date')->nullable();
            $table->string('mode_of_receipt')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->mediumText('contact_person_details')->nullable();
            $table->string('received_by')->nullable();
            $table->string('client_category_id')->nullable();
            $table->string('client_subcategory_id')->nullable();
            $table->string('client_name')->nullable();
            $table->mediumText('client_address')->nullable();
            $table->string('client_mobile')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_division_id')->nullable();
            $table->string('client_district_id')->nullable();
            $table->string('client_thana_id')->nullable();
            $table->string('coordinator_tadbirkar_id')->nullable();
            $table->string('coordinator_tadbirkar_name')->nullable();
            $table->mediumText('coordinator_details')->nullable();
            $table->mediumText('received_documents')->nullable();
            $table->mediumText('required_wanting_documents')->nullable();
            $table->integer('lawyer_advocate_id')->nullable();
            $table->string('assigned_lawyer')->nullable();
            $table->mediumText('lawyers_remarks')->nullable();
            $table->string('case_status_id')->nullable();
            $table->string('status_next_date')->nullable();
            $table->string('status_next_date_fixed_id')->nullable();
            $table->mediumText('status_remarks')->nullable();
            $table->string('case_infos_division_id')->nullable();
            $table->string('case_infos_district_id')->nullable();
            $table->string('case_infos_thana_id')->nullable();
            $table->string('name_of_the_court')->nullable();
            $table->string('case_category_id')->nullable();
            $table->string('case_subcategory_id')->nullable();
            $table->string('case_type_id')->nullable();
            $table->string('case_infos_case_no')->nullable();
            $table->string('case_infos_case_year')->nullable();
            $table->string('law')->nullable();
            $table->string('section')->nullable();
            $table->string('date_of_filing')->nullable();
            $table->string('matter_id')->nullable();
            $table->string('case_infos_complainant_informant_name')->nullable();
            $table->string('complainant_informant_representative')->nullable();
            $table->string('case_infos_accused_name')->nullable();
            $table->string('case_infos_accused_representative')->nullable();
            $table->string('case_infos_allegation_claim_id')->nullable();
            $table->string('case_infos_allegation_claim')->nullable();
            $table->string('amount_of_money')->nullable();
            $table->mediumText('another_claim')->nullable();
            $table->mediumText('summary_facts')->nullable();
            $table->string('date_of_arrest')->nullable();
            $table->string('date_of_bill')->nullable();
            $table->mediumText('case_info_remarks')->nullable();
            $table->string('judgement_date_of_filing')->nullable();
            $table->string('date_of_cognizance')->nullable();
            $table->string('date_of_court_transfer')->nullable();
            $table->string('date_of_charge_framed')->nullable();
            $table->string('date_of_witness_from')->nullable();
            $table->string('date_of_witness_to')->nullable();
            $table->string('date_of_argument')->nullable();
            $table->string('date_of_judgement_order')->nullable();
            $table->mediumText('summary_judgement_order')->nullable();
            $table->mediumText('judgement_remarks')->nullable();
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
        Schema::dropIfExists('criminal_cases');
    }
}
