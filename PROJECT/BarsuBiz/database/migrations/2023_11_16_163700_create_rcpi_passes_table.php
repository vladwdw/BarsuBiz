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
            $table->text("pasNameProject")->nullable();
            $table->text("pasKratkDescrip")->nullable();
            $table->text("pasOtherSphere")->nullable();
            $table->text("pasRinokSbita")->nullable();
            $table->text("pasGeneralPer")->nullable();
            $table->text("pasDescription")->nullable();
            $table->text("pasRealizationTemp")->nullable();
            $table->text("pasObjectComerc")->nullable();
            $table->text("pasDoztizhProject")->nullable();
            $table->text("pasDopInformation")->nullable();
            $table->text("pasAnotherStage")->nullable();
            $table->text("pasOtherAnalog")->nullable();
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
