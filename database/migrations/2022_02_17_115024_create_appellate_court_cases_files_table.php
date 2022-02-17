<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppellateCourtCasesFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appellate_court_cases_files', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->text('uploaded_document')->nullable();
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
        Schema::dropIfExists('appellate_court_cases_files');
    }
}
