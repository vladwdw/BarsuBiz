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
            $table->text("bpFio")->nullable();
            $table->text("bpSoderzh")->nullable();
            $table->text("bpResume")->nullable();
            $table->text("bpProblem")->nullable();
            $table->text("bpProduct")->nullable();
            $table->text("bpAnalize")->nullable();
            $table->text("bpSobstv")->nullable();
            $table->text("bpPotreb")->nullable();
            $table->text("bpPrice")->nullable();
            $table->text("bpConcurents")->nullable();
            $table->text("bpSuppliers")->nullable();
            $table->text("bpProizPlan")->nullable();
            $table->text("bpOrgPlan")->nullable();
            $table->text("bpRelizeProblems")->nullable();
            $table->text("bpFinPlan")->nullable();
            $table->text("bpInformation")->nullable();
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
