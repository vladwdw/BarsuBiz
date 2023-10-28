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
        Schema::create('barsunir', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("user_id");
            $table->string("name")->default("Участие в НИР",date("d/m/Y"));

            $table->string("sinceDir")->nullable();
            $table->string("workTheme")->nullable();
            $table->text("nirRuks")->nullable();
            $table->string("realizationTemp")->nullable();
            $table->string("phone")->nullable();
            $table->string("obosnovanie")->nullable();
            $table->string("goalsNir")->nullable();
            $table->string("sinceElem")->nullable();
            $table->text("ozhidResult")->nullable();
            $table->text("praktZnach")->nullable();
        });
        Schema::table('barsunir', function (Blueprint $table) {
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
        Schema::dropIfExists('barsu_nirs');
    }
};
