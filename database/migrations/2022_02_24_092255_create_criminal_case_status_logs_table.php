<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalCaseStatusLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_case_status_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->integer('updated_case_status_id')->nullable();
            $table->string('updated_order_date')->nullable();
            $table->string('updated_fixed_for')->nullable();
            $table->integer('court_proceedings_id')->nullable();
            $table->string('court_proceedings')->nullable();
            $table->integer('updated_court_order_id')->nullable();
            $table->string('updated_court_order')->nullable();
            $table->integer('updated_day_notes_id')->nullable();
            $table->string('updated_day_notes')->nullable();
            $table->integer('updated_engaged_advocate_id')->nullable();
            $table->integer('updated_next_day_presence_id')->nullable();
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
        Schema::dropIfExists('criminal_case_status_logs');
    }
}
