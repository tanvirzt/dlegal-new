<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetupAccusedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup_accuseds', function (Blueprint $table) {
            $table->id();
            $table->string('accused_name')->nullable();
            $table->string('accused_mobile')->nullable();
            $table->string('accused_email')->nullable();
            $table->mediumText('accused_address')->nullable();
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
        Schema::dropIfExists('setup_accuseds');
    }
}
