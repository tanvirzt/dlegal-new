<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assignment_category_id')->unsigned();
            $table->string('service_type')->nullable();
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('assign_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('note')->nullable();
            $table->datetime('date')->nullable();
            $table->longText('details')->nullable();
            $table->enum('current_status',['In Progress','To Do','Due','Complete'])->default('To Do');
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
        Schema::dropIfExists('assignments');
    }
}
