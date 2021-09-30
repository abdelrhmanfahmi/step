<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscripeExtraPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscripe_extra_package', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('extra_package_id');
            $table->foreign('extra_package_id')->references('id')->on('extrapackages')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedInteger('subscripe_id');
            $table->foreign('subscripe_id')->references('id')->on('subscriptions')->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('subscripe_extra_package');
    }
}
