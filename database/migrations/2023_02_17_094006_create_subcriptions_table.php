<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('website_id')->unsigned();
            $table->unique(['user_id', 'website_id']);


            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('website_id')->references('id')->on('websites')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcriptions');
    }
};
