<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalCasesDocumentsRequiredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_cases_documents_requireds', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('required_wanting_documents_id')->nullable();
            $table->string('required_wanting_documents')->nullable();
            $table->string('required_wanting_documents_date')->nullable();
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
        Schema::dropIfExists('criminal_cases_documents_requireds');
    }
}
