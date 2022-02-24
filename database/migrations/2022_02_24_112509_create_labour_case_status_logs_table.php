<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabourCaseStatusLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labour_case_status_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->integer('updated_court_id')->nullable();
            $table->string('updated_next_date')->nullable();
            $table->integer('updated_next_date_fixed_id')->nullable();
            $table->integer('updated_panel_lawyer_id')->nullable();
            $table->string('order_date')->nullable();
            $table->integer('updated_case_status_id')->nullable();
            $table->string('updated_accused_name')->nullable();
            $table->string('update_description')->nullable();
            $table->string('case_proceedings')->nullable();
            $table->string('case_notes')->nullable();
            $table->string('next_date_fixed_reason')->nullable();
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
        Schema::dropIfExists('labour_case_status_logs');
    }
}
