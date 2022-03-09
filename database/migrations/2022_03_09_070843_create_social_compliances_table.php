<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialCompliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_compliances', function (Blueprint $table) {
            $table->id();
            $table->string('employment_condition')->nullable();
            $table->string('working_hour_leave')->nullable();
            $table->string('compensation_benefit')->nullable();
            $table->string('hygine_safety')->nullable();
            $table->string('welfare_security')->nullable();
            $table->string('industrial_relation')->nullable();
            $table->string('labour_law_safety')->nullable();
            $table->string('bnbc_safety')->nullable();
            $table->string('fire_safety')->nullable();
            $table->string('electrical_safety')->nullable();
            $table->string('natural_disaster')->nullable();
            $table->string('code_of_conduct')->nullable();
            $table->string('international_standard')->nullable();
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
        Schema::dropIfExists('social_compliances');
    }
}
