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
        Schema::create('grants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("user_id");
            $table->string("name")->default("Заявка на получение гранта");
            $table->string('sienceDirection')->nullable();
            $table->string('fioGrad')->nullable();
            $table->string('grandCategory')->nullable();
            $table->string('workName')->nullable();
            $table->longText('disertationTheme')->nullable();
            $table->string('uchrName')->nullable();
            $table->longText('special')->nullable();
            $table->longText('knowledge')->nullable();
            $table->string("owner")->nullable();
        });
        Schema::table('grants', function (Blueprint $table) {
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
        Schema::dropIfExists('grants');
    }
};
