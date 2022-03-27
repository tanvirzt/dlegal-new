<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCivilCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('civil_cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_no')->nullable();
            $table->integer('client_category_id')->nullable();
            $table->integer('client_subcategory_id')->nullable();
            $table->string('date_of_filing')->nullable();
            $table->integer('division_id')->nullable();
            $table->string('case_year')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('amount')->nullable();
            $table->string('location')->nullable();
            $table->integer('case_status_id')->nullable();
            $table->integer('property_type_id')->nullable();
            $table->integer('case_category_id')->nullable();
            $table->integer('case_subcategory_id')->nullable();
            $table->integer('case_type_id')->nullable();
            $table->integer('name_of_the_court_id')->nullable();
            $table->integer('external_council_name_id')->nullable();
            $table->integer('external_council_associates_id')->nullable();
            $table->integer('relevant_law_id')->nullable();
            $table->integer('relevant_sections_id')->nullable();
            $table->string('plaintiff_name')->nullable();
            $table->integer('plaintiff_designaiton_id')->nullable();
            $table->string('next_date')->nullable();
            $table->string('plaintiff_contact_number')->nullable();
            $table->integer('next_date_fixed_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('zone_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->string('subsequent_plaintiff_name')->nullable();
            $table->string('nature_of_suit')->nullable();
            $table->mediumText('defendant_name')->nullable();
            $table->mediumText('defendant_address')->nullable();
            $table->integer('defendant_company_id')->nullable();
            $table->integer('last_order_court_id')->nullable();
            $table->string('additional_order')->nullable();
            $table->string('disbursement_date')->nullable();
            $table->string('date_of_cash_receipt')->nullable();
            $table->mediumText('case_notes')->nullable();
            $table->string('date_of_disposed')->nullable();
            $table->string('total_legal_bill_amount_cost')->nullable();
            $table->integer('assigned_lawyer_id')->nullable();
            $table->mediumText('notes')->nullable();
            $table->mediumText('other_claim')->nullable();
            $table->mediumText('summary_facts_demands')->nullable();
            $table->mediumText('missing_documents_evidence_information')->nullable();
            $table->mediumText('comments')->nullable();
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
        Schema::dropIfExists('civil_cases');
    }
}
