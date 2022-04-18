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
            $table->integer('legal_issue_id')->nullable();
            $table->string('legal_issue_write')->nullable();
            $table->integer('legal_service_id')->nullable();
            $table->string('legal_service_write')->nullable();
            $table->string('complainant_informant_name')->nullable();
            $table->string('accused_name')->nullable();
            $table->integer('in_favour_of_id')->nullable();
            $table->string('case_no')->nullable();
            $table->integer('name_of_the_court_id')->nullable();
            $table->string('next_date')->nullable();
            $table->integer('next_date_fixed_id')->nullable();
            $table->string('received_date')->nullable();
            $table->integer('mode_of_receipt_id')->nullable();
            $table->integer('referrer_id')->nullable();
            $table->string('referrer_write')->nullable();
            $table->mediumText('referrer_details')->nullable();
            $table->string('received_by')->nullable();
            $table->integer('client_party_id')->nullable();
            $table->integer('client_category_id')->nullable();
            $table->integer('client_subcategory_id')->nullable();
            $table->string('client_id')->nullable();
            $table->string('client_name_write')->nullable();
            $table->mediumText('client_address')->nullable();
            $table->string('client_mobile')->nullable();
            $table->string('client_email')->nullable();
            $table->integer('client_profession_id')->nullable();
            $table->string('client_profession_write')->nullable();
            $table->integer('client_division_id')->nullable();
            $table->string('client_divisoin_write')->nullable();
            $table->integer('client_district_id')->nullable();
            $table->string('client_district_write')->nullable();
            $table->integer('client_thana_id')->nullable();
            $table->string('client_thana_write')->nullable();
            $table->string('client_representative_name')->nullable();
            $table->mediumText('client_representative_details')->nullable();
            $table->integer('client_coordinator_tadbirkar_id')->nullable();
            $table->string('coordinator_tadbirkar_write')->nullable();
            $table->mediumText('client_coordinator_details')->nullable();
            $table->integer('opposition_party_id')->nullable();
            $table->integer('opposition_category_id')->nullable();
            $table->integer('opposition_subcategory_id')->nullable();
            $table->string('opposition_id')->nullable();
            $table->string('opposition_write')->nullable();
            $table->mediumText('opposition_address')->nullable();
            $table->string('opposition_mobile')->nullable();
            $table->string('opposition_email')->nullable();
            $table->integer('opposition_profession_id')->nullable();
            $table->string('opposition_profession_write')->nullable();
            $table->integer('opposition_division_id')->nullable();
            $table->string('opposition_divisoin_write')->nullable();
            $table->integer('opposition_district_id')->nullable();
            $table->string('opposition_district_write')->nullable();
            $table->integer('opposition_thana_id')->nullable();
            $table->string('opposition_thana_write')->nullable();
            $table->string('opposition_representative_name')->nullable();
            $table->mediumText('opposition_representative_details')->nullable();
            $table->integer('opposition_coordinator_tadbirkar_id')->nullable();
            $table->string('opposition_coordinator_tadbirkar_write')->nullable();
            $table->mediumText('opposition_coordinator_details')->nullable();
            $table->integer('lawyer_advocate_id')->nullable();
            $table->string('assigned_lawyer_id')->nullable();
            $table->mediumText('lawyers_remarks')->nullable();
            $table->integer('received_documents_id')->nullable();
            $table->string('received_documents_write')->nullable();
            $table->integer('required_wanting_documents_id')->nullable();
            $table->string('required_wanting_documents_write')->nullable();
            $table->integer('case_infos_division_id')->nullable();
            $table->integer('case_infos_district_id')->nullable();
            $table->integer('case_infos_thana_id')->nullable();
            $table->integer('case_category_id')->nullable();
            $table->integer('case_subcategory_id')->nullable();
            $table->integer('case_infos_case_title_id')->nullable();
            $table->string('case_infos_case_no')->nullable();
            $table->string('case_infos_court_id')->nullable();
            $table->integer('case_infos_sub_seq_case_title_id')->nullable();
            $table->string('case_infos_sub_seq_case_no')->nullable();
            $table->string('case_infos_sub_seq_court_id')->nullable();
            $table->string('law_id')->nullable();
            $table->string('law_write')->nullable();
            $table->string('section_id')->nullable();
            $table->string('section_write')->nullable();
            $table->string('date_of_filing')->nullable();
            $table->integer('matter_id')->nullable();
            $table->integer('case_type_id')->nullable();
            $table->string('case_infos_complainant_informant_name')->nullable();
            $table->string('complainant_informant_representative')->nullable();
            $table->string('case_infos_accused_name')->nullable();
            $table->string('case_infos_accused_representative')->nullable();
            $table->string('prosecution_witness')->nullable();
            $table->string('defense_witness')->nullable();
            $table->integer('case_infos_allegation_claim_id')->nullable();
            $table->string('case_infos_allegation_claim_write')->nullable();
            $table->string('amount_of_money')->nullable();
            $table->mediumText('another_claim')->nullable();
            $table->mediumText('recovery_seizure_articles')->nullable();
            $table->mediumText('summary_facts')->nullable();
            $table->mediumText('case_info_remarks')->nullable();
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
