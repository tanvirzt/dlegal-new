<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalCasesOppsitionLawyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_cases_oppsition_lawyers', function (Blueprint $table) {
            $table->id();
            $table->integer('criminal_case_id')->nullable();
            $table->string('opp_lawyer_advocate_write')->nullable();
            $table->string('opp_lawyer_assigned_lawyer')->nullable();
            $table->string('opp_lawyer_contact')->nullable();
            $table->string('opp_lawyers_note')->nullable();
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
        Schema::dropIfExists('criminal_cases_oppsition_lawyers');
    }
}
