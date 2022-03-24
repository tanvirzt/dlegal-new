<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppellateCourtCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appellate_court_cases', function (Blueprint $table) {
            $table->id();
            $table->string('lower_court')->nullable();
            $table->string('case_no')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('thana_id')->nullable();
            $table->integer('case_category_id')->nullable();
            $table->integer('case_class_id')->nullable();
            $table->integer('case_type_id')->nullable();
            $table->integer('relevant_law_sections_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->string('date_of_filing')->nullable();
            $table->string('plaintiff_name')->nullable();
            $table->integer('plaintiff_designaiton_id')->nullable();
            $table->string('plaintiff_contact_number')->nullable();
            $table->string('name_of_the_complainant')->nullable();
            $table->string('complainant_contact_no')->nullable();
            $table->integer('complainant_designation_id')->nullable();
            $table->string('accused_name')->nullable();
            $table->integer('accused_company_id')->nullable();
            $table->string('accused_address')->nullable();
            $table->string('accused_contact_no')->nullable();
            $table->text('other_claim')->nullable();
            $table->text('summary_facts_alligation')->nullable();
            $table->integer('trial_court_id')->nullable();
            $table->string('trial_court_judgement_date')->nullable();
            $table->text('trial_grounds_judgement')->nullable();
            $table->integer('appeal_court_id')->nullable();
            $table->string('appeal_court_judgement_date')->nullable();
            $table->string('appeal_grounds_judgement')->nullable();
            $table->string('appeal_court_judgement')->nullable();
            $table->integer('panel_lawyer_id')->nullable();
            $table->string('total_legal_bill_amount')->nullable();
            $table->integer('case_received_lawyer_id')->nullable();
            $table->string('case_papers_received')->nullable();
            $table->text('tadbirkar_details')->nullable();
            $table->string('tender_no')->nullable();
            $table->string('tender_no_date')->nullable();
            $table->integer('supreme_court_category_id')->nullable();
            $table->integer('supreme_court_subcategory_id')->nullable();
            $table->string('case_no_hcd')->nullable();
            $table->string('date_of_filing_hcd')->nullable();
            $table->integer('hcd_court_id')->nullable();
            $table->integer('law_sections_id')->nullable();
            $table->text('order')->nullable();
            $table->string('order_date')->nullable();
            $table->string('order_no_memo')->nullable();
            $table->string('appellant_petitioner_name')->nullable();
            $table->integer('appellant_designation_id')->nullable();
            $table->string('appellant_address')->nullable();
            $table->string('opposite_party_name')->nullable();
            $table->integer('opposite_party_designation_id')->nullable();
            $table->string('opposite_party_address')->nullable();
            $table->integer('party_steps_taken_id')->nullable();
            $table->integer('case_status_id')->nullable();
            $table->integer('fixed_hearing_court_id')->nullable();
            $table->integer('court_steps_taken_id')->nullable();
            $table->string('court_next_steps_date')->nullable();
            $table->integer('assigned_lawyer_id')->nullable();
            $table->text('documents_lawyers_appointment')->nullable();
            $table->text('documents_sent_to_law_chamber')->nullable();
            $table->text('documents_received_field_programe')->nullable();
            $table->text('missing_documents_evidence')->nullable();
            $table->text('ground_appeal_revision')->nullable();
            $table->text('recommendations')->nullable();
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
        Schema::dropIfExists('appellate_court_cases');
    }
}
