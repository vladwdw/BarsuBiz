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
        Schema::create('gpni_obosns', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->longText('name_nir')->nullable();
            $table->longText('goals_nir')->nullable();
            $table->longText('relevance_nir')->nullable();
            $table->longText('results_nir')->nullable();
            $table->longText('plan_results_nir')->nullable();
            $table->longText('volume_nir')->nullable();
        });
        Schema::table('gpni_obosns', function (Blueprint $table) {
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
        Schema::dropIfExists('gpni_obosns');
    }
};
