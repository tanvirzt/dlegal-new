<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetupComplainantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup_complainants', function (Blueprint $table) {
            $table->id();
            $table->string('complainant_name')->nullable();
            $table->string('complainant_mobile')->nullable();
            $table->string('complainant_email')->nullable();
            $table->mediumText('complainant_address')->nullable();
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
        Schema::dropIfExists('setup_complainants');
    }
}
