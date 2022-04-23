<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalCaseActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_case_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('activity_date')->nullable();
            $table->string('activity_action')->nullable();
            $table->string('activity_progress')->nullable();
            $table->integer('activity_mode_id')->nullable();
            $table->string('activity_mode_write')->nullable();
            $table->string('activity_time_spent')->nullable();
            $table->string('activity_engaged_id')->nullable();
            $table->string('activity_engaged_write')->nullable();
            $table->integer('activity_forwarded_to_id')->nullable();
            $table->string('activity_forwarded_to_write')->nullable();
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
        Schema::dropIfExists('criminal_case_activity_logs');
    }
}
