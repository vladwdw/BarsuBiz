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
            $table->text("teoPotrProblem")->nullable();
            $table->text("teoDescripProd")->nullable();
            $table->text("teoBizModel")->nullable();
            $table->text("teoRinokInf")->nullable();
            $table->text("teoDescripTechn")->nullable();
            $table->text("teoConcurent")->nullable();
            $table->text("teoIntSobstv")->nullable();
            $table->text("teoTeamProject")->nullable();
            $table->text("teoMarketing")->nullable();
            $table->text("teoFinIndic")->nullable();
            $table->text("teoUnitEconomy")->nullable();
            $table->text("teoInvestPerm")->nullable();
            $table->text("teoRiskProject")->nullable();
            $table->text("teoRelizeTemp")->nullable();

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
