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
        Schema::create('gpni_calculates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('totalCalculate1')->nullable();
            $table->string('firstCalculate1')->nullable();
            $table->string('totalCalculate2')->nullable();
            $table->string('firstCalculate2')->nullable();
            $table->string('totalCalculate3')->nullable();
            $table->string('firstCalculate3')->nullable();
            $table->string('totalCalculate4')->nullable();
            $table->string('firstCalculate4')->nullable();
            $table->string('totalCalculate5')->nullable();
            $table->string('firstCalculate5')->nullable();
            $table->string('totalCalculate6')->nullable();
            $table->string('firstCalculate6')->nullable();
            $table->string('totalCalculate7')->nullable();
            $table->string('firstCalculate7')->nullable();
            $table->string('totalCalculate8')->nullable();
            $table->string('firstCalculate8')->nullable();
            $table->string('totalCalculateSum')->nullable();
            $table->string('firstCalculateSum')->nullable();
        });
        Schema::table('gpni_calculates', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('gpnis');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gpni_calculates');
    }
};
