<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalCasesCaseFileLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_cases_case_file_locations', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->integer('case_file_location_new_id')->nullable();
            $table->string('case_file_location_new_office')->nullable();
            $table->string('case_file_location_new_almirah')->nullable();
            $table->string('case_file_location_new_self')->nullable();
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
        Schema::dropIfExists('criminal_cases_case_file_locations');
    }
}
