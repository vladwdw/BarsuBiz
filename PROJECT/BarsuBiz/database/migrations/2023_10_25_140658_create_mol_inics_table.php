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
        Schema::create('mol_inics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("user_id");
            $table->string("name")->default("Молодежные инициативы",date("d/m/Y"));
            $table->text("nameProject")->nullable();
            $table->text("nameRegion")->nullable();
            $table->text("namePunct")->nullable();
            $table->text("descriptionProblem")->nullable();
            $table->string("realizationTemp")->nullable();
            $table->string("fioRuk")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->text("inicGroup")->nullable();
        });
        Schema::table('mol_inics', function (Blueprint $table) {
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
        Schema::dropIfExists('mol_inics');
    }
};
