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
        Schema::create('rcpi_bps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id');
            $table->longText("bpFio")->nullable();
            $table->longText("bpSoderzh")->nullable();
            $table->longText("bpResume")->nullable();
            $table->longText("bpProblem")->nullable();
            $table->longText("bpProduct")->nullable();
            $table->longText("bpAnalize")->nullable();
            $table->longText("bpSobstv")->nullable();
            $table->longText("bpPotreb")->nullable();
            $table->longText("bpPrice")->nullable();
            $table->longText("bpConcurents")->nullable();
            $table->longText("bpSuppliers")->nullable();
            $table->longText("bpProizPlan")->nullable();
            $table->longText("bpOrgPlan")->nullable();
            $table->longText("bpRelizeProblems")->nullable();
            $table->longText("bpFinPlan")->nullable();
            $table->longText("bpInformation")->nullable();
        });
        Schema::table('rcpi_bps', function (Blueprint $table) {
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
        Schema::dropIfExists('rcpi_bps');
    }
};
