<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabourCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labour_cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_no')->nullable();
            $table->string('case_year')->nullable();
            $table->string('client_category_id')->nullable();
            $table->string('client_subcategory_id')->nullable();
            $table->string('date_of_case_received')->nullable();
            $table->string('case_category_id')->nullable();
            $table->string('case_subcategory_id')->nullable();
            $table->string('case_type_id')->nullable();
            $table->string('trial_court')->nullable();
            $table->string('zone_id')->nullable();
            $table->string('area_id')->nullable();
            $table->string('branch_id')->nullable();
            $table->string('company_organization_id')->nullable();
            $table->string('name_of_the_court_id')->nullable();
            $table->string('date_of_filing')->nullable();
            $table->string('division_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('thana_id')->nullable();
            $table->string('relevant_law_id')->nullable();
            $table->string('relevant_sections_id')->nullable();
            $table->string('alligation')->nullable();
            $table->string('amount')->nullable();
            $table->string('name_of_the_first_party')->nullable();
            $table->string('first_party_contact_no')->nullable();
            $table->string('first_party_designation_id')->nullable();
            $table->string('external_council_name_id')->nullable();
            $table->string('external_council_associates_id')->nullable();
            $table->string('second_party_name')->nullable();
            $table->string('second_party_address')->nullable();
            $table->string('case_status_id')->nullable();
            $table->string('last_order_court_id')->nullable();
            $table->string('next_date')->nullable();
            $table->string('next_date_fixed_id')->nullable();
            $table->string('case_notes')->nullable();
            $table->string('assigned_lawyer_id')->nullable();
            $table->string('total_legal_bill_amount')->nullable();
            $table->string('other_claim')->nullable();
            $table->string('summary_facts_alligation')->nullable();
            $table->string('prayer_claims_by_psg')->nullable();
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
        Schema::dropIfExists('labour_cases');
    }
}
