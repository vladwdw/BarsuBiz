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
        Schema::create('hudred_ideas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->timestamps();
            $table->string("name")->default("100 ИДЕЙ ДЛЯ БЕЛАРУСИ",date("d/m/Y"));;
            $table->string('name_project')->nullable();
            $table->text('name_autors')->nullable();
            $table->longText('relevance')->nullable();
            $table->longText('goals_objectives')->nullable();
            $table->longText('property_protection')->nullable();
            $table->longText('offers')->nullable();
            $table->longText('advantages_project')->nullable();
            $table->string("owner")->nullable();

        });
        Schema::table('hudred_ideas', function (Blueprint $table) {
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
        Schema::dropIfExists('hudred_ideas');
    }
};
