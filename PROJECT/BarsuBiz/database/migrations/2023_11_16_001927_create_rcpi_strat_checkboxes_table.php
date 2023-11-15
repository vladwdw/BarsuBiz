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
        Schema::create('rcpi_strat_checkboxes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("value");
            $table->boolean("status");
            $table->unsignedBigInteger('project_id')->nullable();
        });
        Schema::table('rcpi_strat_checkboxes', function (Blueprint $table) {
            $table->foreign("project_id")->references('id')->on('repconc');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rcpi_strat_checkboxes');
    }
};
