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
        Schema::create('barsunir_dop', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('workEtap')->nullable();
            $table->string('nachSrok')->nullable();
  $table->string('endSrok')->nullable();
  $table->string('kontrResult')->nullable();
            $table->timestamps();
        });
        Schema::table('barsunir_dop', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('barsunir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barsu_nir_dops');
    }
};
