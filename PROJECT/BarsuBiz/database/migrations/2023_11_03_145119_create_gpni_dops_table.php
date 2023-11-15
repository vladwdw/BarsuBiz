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
        Schema::create('gpni_dops', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id')->nullable();
         
            $table->string('fio')->nullable();
            $table->string('uchStep')->nullable();
            $table->string('uchZav')->nullable();
            $table->string('kafLab')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

        });
        Schema::table('gpni_dops', function (Blueprint $table) {
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
        Schema::dropIfExists('gpni_dops');
    }
};
