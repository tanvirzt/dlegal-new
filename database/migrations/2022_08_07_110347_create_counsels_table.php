<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counsels', function (Blueprint $table) {
            $table->id();
            $table->string('counsel_type')->nullable();
            $table->string('counsel_category')->nullable();
            $table->string('chamber_name')->nullable();
            $table->string('counsel_role_id')->nullable();
            $table->string('counsel_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('relation')->nullable();
            $table->string('professional_name')->nullable();
            $table->string('ssc_year')->nullable();
            $table->string('ssc_institution')->nullable();
            $table->string('hsc_year')->nullable();
            $table->string('hsc_institution')->nullable();
            $table->string('llb_year')->nullable();
            $table->string('llb_institution')->nullable();
            $table->string('llm_year')->nullable();
            $table->string('llm_instution')->nullable();
            $table->string('bar_council_enrollment_date')->nullable();
            $table->string('bar_council_enrollment_sanad_no')->nullable();
            $table->string('mother_bar_name')->nullable();
            $table->string('mother_bar_membership_number')->nullable();
            $table->string('practicing_bar_date')->nullable();
            $table->string('practicing_bar_membership_number')->nullable();
            $table->string('high_court_enrollment_date')->nullable();
            $table->string('high_court_enrollment_membership_number')->nullable();
            $table->string('bar_council_fees')->nullable();
            $table->string('bar_council_fees_write')->nullable();
            $table->string('district_bar_mem_fee')->nullable();
            $table->string('district_bar_mem_write')->nullable();
            $table->string('scba_memb_fee')->nullable();
            $table->string('scba_memb_fee_write')->nullable();
            $table->string('professional_contact_number')->nullable();
            $table->string('professional_contact_number_write')->nullable();
            $table->string('professional_email')->nullable();
            $table->string('professional_email_write')->nullable();
            $table->string('name_of_associates')->nullable();
            $table->string('name_of_associates_write')->nullable();
            $table->string('professional_experience_one')->nullable();
            $table->string('professional_experience_two')->nullable();
            $table->string('date_of_joining')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('counsels');
    }
}
