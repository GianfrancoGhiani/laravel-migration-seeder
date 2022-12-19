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
        Schema::create('trains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company');
            $table->string('leaving_from');
            $table->string('arriving_to');
            $table->time('leaving_time');
            $table->time('arriving_time');
            $table->date('day_of_leaving');
            $table->bigInteger('train_code')->unique();
            $table->integer('wagons_num')->nullable();
            $table->boolean('on_time');
            $table->boolean('deleted');
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
        Schema::dropIfExists('train');
    }
};
