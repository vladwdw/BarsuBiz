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
        Schema::create('repconcs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name")->default("РКИП",date("d/m/Y"));
            $table->unsignedBigInteger("user_id");
            $table->string('nominationName')->nullable();
            $table->string('nameProject')->nullable();
            $table->string('fio')->nullable();
            $table->string('teachWorkPlace')->nullable();
            $table->string('dolzhnUch')->nullable();
            $table->string('uchStep')->nullable();
            $table->string('adress')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('projectLink')->nullable();
            $table->Text('yurName')->nullable();
            $table->string('fioRuk')->nullable();
            $table->string('dolzhnYur')->nullable();
            $table->string('yurStep')->nullable();
            $table->string('yurAdress')->nullable();
            $table->string('platNumber')->nullable();
            $table->string('yurPhone')->nullable();
            $table->string('yurEmail')->nullable();
            $table->longText('fioCommand')->nullable();
            $table->longText('yurLink')->nullable();
            $table->string("owner")->nullable();
        });
        Schema::table('repconcs', function (Blueprint $table) {
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
        Schema::dropIfExists('repconcs');
    }
};
