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
            $table->string('case_no')->nullable();
            $table->integer('case_category_id')->nullable();
            $table->string('subsequent_case_no')->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('area_id')->nullable();
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
            $table->string('complainant_name')->nullable();
            $table->string('complainant_contact_number')->nullable();
            $table->integer('complainant_designation_id')->nullable();
            $table->integer('case_status_id')->nullable();
            $table->integer('external_council_name_id')->nullable();
            $table->string('plaintiff_name')->nullable();
            $table->integer('plaintiff_designaiton_id')->nullable();
            $table->string('plaintiff_contact_number')->nullable();
            $table->string('last_order_court')->nullable();
            $table->string('date_of_case_received')->nullable();
            $table->string('next_date')->nullable();
            $table->integer('next_date_fixed_id')->nullable();
            $table->string('accused_name')->nullable();
            $table->string('accused_contact_number')->nullable();
            $table->string('accused_address')->nullable();
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
