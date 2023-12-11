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
        Schema::create('rcpi_strats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id');
            $table->longText('sOtherSbosob')->nullable();
            $table->longText('sFio')->nullable();
            $table->longText('sDescriptKomerc')->nullable();
            $table->longText('sStratComerc')->nullable();
        });
        Schema::table('rcpi_strats', function (Blueprint $table) {
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
        Schema::dropIfExists('rcpi_strats');
    }
};
