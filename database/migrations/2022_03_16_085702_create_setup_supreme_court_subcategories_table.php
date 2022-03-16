<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetupSupremeCourtSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup_supreme_court_subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('supreme_court_type')->nullable();
            $table->integer('supreme_court_category_id')->nullable();
            $table->string('supreme_court_subcategory')->nullable();
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
        Schema::dropIfExists('setup_supreme_court_subcategories');
    }
}
