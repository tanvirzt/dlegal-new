<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamberStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamber_staff', function (Blueprint $table) {
            $table->id();
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
            $table->string('professional_contact_number')->nullable(); 
            $table->string('professional_contact_number_write')->nullable(); 
            $table->string('professional_email')->nullable(); 
            $table->string('professional_email_write')->nullable(); 
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
        Schema::dropIfExists('chamber_staff');
    }
}
