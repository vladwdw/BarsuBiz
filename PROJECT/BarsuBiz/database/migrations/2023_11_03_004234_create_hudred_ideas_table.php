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
        Schema::create('hudred_ideas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->timestamps();
            $table->string("name")->default("100 ИДЕЙ ДЛЯ БЕЛАРУСИ",date("d/m/Y"));;
            $table->string('name_project')->nullable();
            $table->text('name_autors')->nullable();
            $table->text('relevance')->nullable();
            $table->text('goals_objectives')->nullable();
            $table->text('property_protection')->nullable();
            $table->text('offers')->nullable();
            $table->text('advantages_project')->nullable();

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
