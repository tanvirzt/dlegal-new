<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalCasesLetterNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_cases_letter_notices', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('letter_notice_date')->nullable();
            $table->string('letter_notice_documents_id')->nullable();
            $table->string('letter_notice_particulars_id')->nullable();
            $table->string('letter_notice_org')->nullable();
            $table->string('letter_notice_pht')->nullable();
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
        Schema::dropIfExists('criminal_cases_letter_notices');
    }
}
