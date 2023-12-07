<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpnis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("user_id");
            $table->string("name")->default("ГПНИ",date("d/m/Y"));
            $table->string("number")->nullable();
            $table->string("data")->nullable();
            $table->string("year")->nullable();
            $table->string("nameN")->nullable();
            $table->string("nameP")->nullable();
            $table->string("sincedir")->nullable();
            $table->string("orgZav")->nullable();
            $table->string("nach")->nullable();
            $table->string("end")->nullable();
            $table->string("allCost")->nullable();
            $table->string("fin1")->nullable();
            $table->string("fin2")->nullable();
            $table->string("fin3")->nullable();
            $table->string("owner")->nullable();
        });
        Schema::table('gpnis', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gpnis');
    }
};
