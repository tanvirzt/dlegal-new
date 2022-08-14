<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambers', function (Blueprint $table) {
            $table->id();
            $table->string('chamber_name')->nullable(); 
            $table->string('chamber_logo')->nullable(); 
            $table->string('main_office_address')->nullable(); 
            $table->string('chamber_telephone')->nullable(); 
            $table->string('chamber_mobile_one')->nullable(); 
            $table->string('chamber_mobile_two')->nullable(); 
            $table->string('chamber_email_one')->nullable(); 
            $table->string('chamber_email_two')->nullable(); 
            $table->string('branch_office_address_one')->nullable(); 
            $table->string('branch_office_address_two')->nullable(); 
            $table->string('head_of_chamber')->nullable(); 
            $table->string('head_of_chamber_signature')->nullable(); 
            $table->string('admin_of_chamber')->nullable(); 
            $table->string('admin_of_chamber_signature')->nullable(); 
            $table->string('accountant')->nullable(); 
            $table->string('accountant_signature')->nullable(); 
            $table->string('head_clerk')->nullable(); 
            $table->string('head_clerk_signature')->nullable(); 
            $table->string('letterhead_write_up')->nullable(); 
            $table->string('letterhead_address')->nullable(); 
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
        Schema::dropIfExists('chambers');
    }
}
