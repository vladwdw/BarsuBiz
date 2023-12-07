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
        Schema::create('grant_calculates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('pay')->nullable();
            $table->string('accruals')->nullable();
            $table->string('materials')->nullable();
            $table->string('business')->nullable();
            $table->string('invoices')->nullable();
            $table->string('costs')->nullable();
            $table->string('sum')->nullable();
        });
        Schema::table('grant_calculates', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('grants');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grant_calculates');
    }
};
