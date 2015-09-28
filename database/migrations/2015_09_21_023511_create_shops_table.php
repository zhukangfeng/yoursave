<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->string('name');
            $table->string('address');
            $table->string('web_site');
            $table->string('phone_number', '20');
            $table->string('shop_info');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamp();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('shops');
    }
}
