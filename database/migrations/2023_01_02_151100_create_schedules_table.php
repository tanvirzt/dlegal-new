<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('schedule_category_id')->unsigned();
            $table->string('meeting_type')->nullable();
            $table->string('service_type')->nullable();
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('assign_id')->unsigned();
            $table->string('place')->nullable();
            $table->string('title')->nullable();
            $table->text('note')->nullable();
            $table->datetime('date')->nullable();
            $table->longText('details')->nullable();
            $table->enum('current_status',['In Progress','To Do','Due','Complete'])->default('To Do');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
