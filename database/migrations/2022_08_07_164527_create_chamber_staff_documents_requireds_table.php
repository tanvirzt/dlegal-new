<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamberStaffDocumentsRequiredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamber_staff_documents_requireds', function (Blueprint $table) {
            $table->id();
            $table->integer('chamber_staff_id')->nullable();
            $table->integer('required_wanting_documents_id')->nullable();
            $table->string('required_wanting_documents')->nullable();
            $table->string('required_wanting_documents_date')->nullable();
            $table->integer('required_wanting_documents_type_id')->nullable();
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
        Schema::dropIfExists('chamber_staff_documents_requireds');
    }
}
