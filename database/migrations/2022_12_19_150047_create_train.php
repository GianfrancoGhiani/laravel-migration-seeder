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
        Schema::create('train', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('leaving_from');
            $table->string('arriving_to');
            $table->timestamps('leaving_time');
            $table->timestamps('arriving_time');
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
