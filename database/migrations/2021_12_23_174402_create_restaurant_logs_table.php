<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('url');
            $table->string('name', 30);
            $table->string('location', 3);
            $table->boolean('gone')->default('0');
            $table->timestamp('gone_date')->nullable($value = true);
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
        Schema::dropIfExists('restaurant_logs');
    }
}
