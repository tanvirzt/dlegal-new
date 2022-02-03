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
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('amount')->nullable();
            $table->integer('case_status_id')->nullable();
            $table->integer('case_category_nature_id')->nullable();
            $table->integer('external_council_name_id')->nullable();
            $table->string('plaintiff_name')->nullable();
            $table->integer('plaintiff_designaiton_id')->nullable();
            $table->string('plaintiff_contact_number')->nullable();
            $table->string('subsequent_plaintiff_name')->nullable();
            $table->string('last_order_court')->nullable();
            $table->string('additional_order')->nullable();
            $table->string('disbursement_date')->nullable();
            $table->string('last_date_of_cash_receipt')->nullable();
            $table->string('date_of_disposed')->nullable();
            $table->string('date_of_filing')->nullable();
            $table->string('defendent_name')->nullable();
            $table->string('defendent_address')->nullable();
            $table->string('defendent_contact_no')->nullable();
            $table->string('date_of_cash_received')->nullable();
            $table->string('case_year')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('location')->nullable();
            $table->string('property_type')->nullable();
            $table->integer('name_of_the_court_id')->nullable();
            $table->integer('relevant_law_sections_id')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('next_date')->nullable();
            $table->integer('next_date_fixed_id')->nullable();
            $table->string('name_of_suit')->nullable();
            $table->string('date_of_incident')->nullable();
            $table->string('date_of_incident_to')->nullable();
            $table->string('first_identification_person')->nullable();
            $table->string('date_of_identification')->nullable();
            $table->string('case_notes')->nullable();
            $table->string('document_upload')->nullable();
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
