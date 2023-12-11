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
        Schema::create('rcpi_passes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id');
            $table->longText("pasNameProject")->nullable();
            $table->longText("pasKratkDescrip")->nullable();
            $table->longText("pasOtherSphere")->nullable();
            $table->longText("pasRinokSbita")->nullable();
            $table->longText("pasGeneralPer")->nullable();
            $table->longText("pasDescription")->nullable();
            $table->longText("pasRealizationTemp")->nullable();
            $table->longText("pasObjectComerc")->nullable();
            $table->longText("pasDoztizhProject")->nullable();
            $table->longText("pasDopInformation")->nullable();
            $table->longText("pasAnotherStage")->nullable();
            $table->longText("pasOtherAnalog")->nullable();
        });
        Schema::table('rcpi_passes', function (Blueprint $table) {
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
        Schema::dropIfExists('rcpi_passes');
    }
};
