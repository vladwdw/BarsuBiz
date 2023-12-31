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
        Schema::create('gpni_plans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('direction')->nullable();
            $table->longText('Carryingout')->nullable();
            $table->longText('nameingeneral')->nullable();
            $table->longText('nachPlanneddates')->nullable();
            $table->longText('endPlanneddates')->nullable();
            $table->longText('totalcost')->nullable();
            $table->longText('results')->nullable();

            $table->longText('name1p')->nullable();
            $table->longText('nachPlanneddates1p')->nullable();
            $table->longText('endPlanneddates1p')->nullable();
            $table->longText('totalcost1p')->nullable();
            $table->longText('results1p')->nullable();

            $table->string('name2p')->nullable();
            $table->string('nachPlanneddates2p')->nullable();
            $table->string('endPlanneddates2p')->nullable();
            $table->string('totalcost2p')->nullable();
            $table->string('results2p')->nullable();
            // $table->string('totalCalculate1')->nullable();
            // $table->string('firstCalculate1')->nullable();
            // $table->string('totalCalculate2')->nullable();
            // $table->string('firstCalculate2')->nullable();
            // $table->string('totalCalculate3')->nullable();
            // $table->string('firstCalculate3')->nullable();
            // $table->string('totalCalculate4')->nullable();
            // $table->string('firstCalculate4')->nullable();
            // $table->string('totalCalculate5')->nullable();
            // $table->string('firstCalculate5')->nullable();
            // $table->string('totalCalculate6')->nullable();
            // $table->string('firstCalculate6')->nullable();
            // $table->string('totalCalculate7')->nullable();
            // $table->string('firstCalculate7')->nullable();
            // $table->string('totalCalculate8')->nullable();
            // $table->string('firstCalculate8')->nullable();
            // $table->string('totalCalculateSum')->nullable();
            // $table->string('firstCalculateSum')->nullable();
        });
        Schema::table('gpni_plans', function (Blueprint $table) {
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
        Schema::dropIfExists('gpni_plans');
    }
};
