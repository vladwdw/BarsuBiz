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
        Schema::create('rcpi_teos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id');
            $table->longText("teoPotrProblem")->nullable();
            $table->longText("teoDescripProd")->nullable();
            $table->longText("teoBizModel")->nullable();
            $table->longText("teoRinokInf")->nullable();
            $table->longText("teoDescripTechn")->nullable();
            $table->longText("teoConcurent")->nullable();
            $table->longText("teoIntSobstv")->nullable();
            $table->longText("teoTeamProject")->nullable();
            $table->longText("teoMarketing")->nullable();
            $table->longText("teoFinIndic")->nullable();
            $table->longText("teoUnitEconomy")->nullable();
            $table->longText("teoInvestPerm")->nullable();
            $table->longText("teoRiskProject")->nullable();
            $table->longText("teoRelizeTemp")->nullable();

        });
        
        Schema::table('rcpi_teos', function (Blueprint $table) {
            $table->foreign("project_id")->references('id')->on('repconcs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rcpi_teos');
    }
};
