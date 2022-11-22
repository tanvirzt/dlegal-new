<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name')->nullable();
            $table->string('address')->nullable();
            $table->string('nid_passport')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('fax')->nullable();
            $table->string('email_address')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('short_name')->nullable();
            $table->string('credit_sale_limit')->nullable();
            $table->string('employee_image')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
