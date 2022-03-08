<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulatoryCompliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulatory_compliances', function (Blueprint $table) {
            $table->id();
            $table->string('certificates_name')->nullable();
            $table->integer('compliance_category_id')->nullable();
            $table->string('certificates_authority')->nullable();
            $table->string('certificates_ministry')->nullable();
            $table->string('certificates_getting_cl_first_date')->nullable();
            $table->string('certificates_expires')->nullable();
            $table->string('certificates_renew')->nullable();
            $table->string('certificates_special_provision')->nullable();
            $table->string('certificates_special_remarks')->nullable();
            $table->string('govt_authority')->nullable();
            $table->string('govt_ministry_dept')->nullable();
            $table->string('govt_getting_cl_first_date')->nullable();
            $table->string('govt_expires')->nullable();
            $table->string('govt_renew')->nullable();
            $table->string('govt_special_provision')->nullable();
            $table->string('govt_special_remarks')->nullable();
            $table->string('utility_electricity')->nullable();
            $table->string('utility_gas')->nullable();
            $table->string('utility_sewerage')->nullable();
            $table->string('utility_water')->nullable();
            $table->string('utility_expires')->nullable();
            $table->string('utility_renew')->nullable();
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
        Schema::dropIfExists('regulatory_compliances');
    }
}
