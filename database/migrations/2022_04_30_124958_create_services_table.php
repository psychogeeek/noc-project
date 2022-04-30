<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');

            $table->bigInteger('service_type_id')->unsigned()->index();
            $table->foreign('service_type_id')->references('id')->on('service_types')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('pop_point_id')->unsigned()->index();
            $table->foreign('pop_point_id')->references('id')->on('pop_points')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('customer_id')->unsigned()->index();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('services');
    }
}
