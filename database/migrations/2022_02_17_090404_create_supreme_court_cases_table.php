<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupremeCourtCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supreme_court_cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_no')->nullable();
            $table->string('date_of_case_received')->nullable();
            $table->string('case_category_nature_id')->nullable();
            $table->integer('case_type_id')->nullable();
            $table->string('subsequent_case_no')->nullable();
            $table->integer('zone_id')->nullable();
            $table->string('area_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->string('member_no')->nullable();
            $table->integer('program_id')->nullable();
            $table->string('police_station')->nullable();
            $table->integer('name_of_the_court_id')->nullable();
            $table->string('date_of_filing')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('relevant_law_sections_id')->nullable();
            $table->integer('alligation_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('name_of_the_complainant')->nullable();
            $table->string('complainant_contact_no')->nullable();
            $table->integer('complainant_designation_id')->nullable();
            $table->integer('external_council_name_id')->nullable();
            $table->integer('external_council_associates_id')->nullable();
            $table->string('opposite_party_name')->nullable();
            $table->string('opposite_party_address')->nullable();
            $table->integer('case_status_id')->nullable();
            $table->integer('last_order_court_id')->nullable();
            $table->string('accused_name')->nullable();
            $table->integer('accused_company_id')->nullable();
            $table->string('next_date')->nullable();
            $table->string('accused_address')->nullable();
            $table->string('accused_contact_no')->nullable();
            $table->integer('next_date_fixed_id')->nullable();
            $table->string('plaintiff_name')->nullable();
            $table->integer('plaintiff_designaiton_id')->nullable();
            $table->string('plaintiff_contact_number')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('case_notes')->nullable();
            $table->integer('panel_lawyer_id')->nullable();
            $table->integer('assigned_lawyer_id')->nullable();
            $table->string('other_claim')->nullable();
            $table->string('summary_facts_alligation')->nullable();
            $table->string('prayer_claims_by_psg')->nullable();
            $table->string('total_legal_bill_amount')->nullable();
            $table->string('missing_documents_evidence')->nullable();
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('supreme_court_cases');
    }
}
