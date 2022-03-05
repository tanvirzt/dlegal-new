<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetupSellerBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup_seller_buyers', function (Blueprint $table) {
            $table->id();
            $table->integer('title_id')->nullable();
            $table->string('seller_or_buyer')->nullable();
            $table->string('seller_buyer_name')->nullable();
            $table->string('email')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('setup_seller_buyers');
    }
}
