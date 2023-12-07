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
            $table->text('pay')->nullable();
            $table->text('accruals')->nullable();
            $table->text('materials')->nullable();
            $table->text('business')->nullable();
            $table->text('invoices')->nullable();
            $table->text('costs')->nullable();
            $table->text('sum')->nullable();
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
