<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flat_information', function (Blueprint $table) {
            $table->id();
            $table->integer('property_type_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('thana_id')->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('buyer_id')->nullable();
            $table->string('cs_khatian')->nullable();
            $table->string('cs_dag')->nullable();
            $table->string('sa_khatian')->nullable();
            $table->string('sa_dag')->nullable();
            $table->string('rs_khatian')->nullable();
            $table->string('rs_dag')->nullable();
            $table->string('bs_khatian')->nullable();
            $table->string('bs_dag')->nullable();
            $table->string('khatian_dag_city_jorip')->nullable();
            $table->string('flat_area')->nullable();
            $table->string('deed_no')->nullable();
            $table->string('date_of_deed')->nullable();
            $table->string('deed_value')->nullable();
            $table->string('possession')->nullable();
            $table->string('boundary_wall')->nullable();
            $table->string('any_dispute')->nullable();
            $table->string('any_suit_case')->nullable();
            $table->string('flat_owner')->nullable();
            $table->string('mouza_name')->nullable();
            $table->string('mutation_khatian_no')->nullable();
            $table->string('mutation_case_no')->nullable();
            $table->string('mutation_khatian_owner')->nullable();
            $table->string('dcr_number')->nullable();
            $table->string('dcr_date')->nullable();
            $table->string('register_office_name')->nullable();
            $table->integer('floor_id')->nullable();
            $table->integer('flat_number_id')->nullable();
            $table->string('flat_size')->nullable();
            $table->string('flat_number')->nullable();
            $table->string('flat_compliance')->nullable();
            $table->string('electricity')->nullable();
            $table->string('gas')->nullable();
            $table->string('sewerage')->nullable();
            $table->string('water')->nullable();
            $table->string('expires')->nullable();
            $table->string('renew')->nullable();
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
        Schema::dropIfExists('flat_information');
    }
}
