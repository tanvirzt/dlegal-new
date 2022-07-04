<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetupCourtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup_courts', function (Blueprint $table) {
            $table->id();
            $table->string('case_class_id')->nullable();
            $table->integer('case_category_id')->nullable();
            $table->string('applicable_district_id')->nullable();
            $table->string('all_district')->nullable();
            $table->string('case_type')->nullable();
            $table->string('court_name')->nullable();
            $table->string('court_short_name')->nullable();
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
        Schema::dropIfExists('setup_courts');
    }
}
