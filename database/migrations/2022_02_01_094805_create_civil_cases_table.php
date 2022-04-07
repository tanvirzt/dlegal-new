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
            $table->string('case')->nullable();
            $table->string('client')->nullable();
            $table->string('case_no')->nullable();
            $table->integer('name_of_the_court_id')->nullable();
            $table->string('next_date')->nullable();
            $table->integer('next_date_fixed_id')->nullable();
            $table->string('in_favour_of')->nullable();
            $table->string('received_date')->nullable();
            $table->string('received_from')->nullable();
            $table->string('mode_of_receipt')->nullable();
            $table->mediumText('receiver_contact_details')->nullable();
            $table->string('received_by')->nullable();
            $table->integer('client_category_id')->nullable();
            $table->integer('client_subcategory_id')->nullable();
            $table->string('client_name')->nullable();
            $table->mediumText('client_address')->nullable();
            $table->integer('client_division_id')->nullable();
            $table->integer('client_district_id')->nullable();
            $table->integer('client_thana_id')->nullable();
            $table->mediumText('received_documents')->nullable();
            $table->mediumText('required_missing_documents')->nullable();
            $table->integer('update_case_status_id')->nullable();
            $table->string('update_next_date')->nullable();
            $table->integer('update_next_date_fixed_id')->nullable();
            $table->string('case_proceedings')->nullable();
            $table->mediumText('update_case_notes')->nullable();
            $table->integer('next_day_presence_id')->nullable();
            $table->integer('case_category_id')->nullable();
            $table->integer('case_subcategory_id')->nullable();
            $table->integer('case_type_id')->nullable();
            $table->mediumText('case_infos_case_no')->nullable();
            $table->mediumText('name_of_the_court')->nullable();
            $table->string('date_of_filing')->nullable();
            $table->string('law')->nullable();
            $table->string('section')->nullable();
            $table->integer('case_infos_division_id')->nullable();
            $table->integer('case_infos_district_id')->nullable();
            $table->integer('case_infos_thana_id')->nullable();
            $table->string('allegation_claim')->nullable();
            $table->string('amount_of_money')->nullable();
            $table->mediumText('another_claim')->nullable();
            $table->mediumText('summary_facts')->nullable();
            $table->string('complainant_name')->nullable();
            $table->mediumText('representative_name')->nullable();
            $table->mediumText('representative_details')->nullable();
            $table->string('accused_name')->nullable();
            $table->string('advocate_name')->nullable();
            $table->string('assigned_lawyer')->nullable();
            $table->integer('case_status_id')->nullable();
            $table->string('status_next_date')->nullable();
            $table->integer('status_next_date_fixed_id')->nullable();
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
