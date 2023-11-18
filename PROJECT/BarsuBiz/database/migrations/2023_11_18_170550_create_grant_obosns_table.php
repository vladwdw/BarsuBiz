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
        Schema::create('grant_obosns', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('goal')->nullable();
            $table->string('idea')->nullable();
            $table->string('struct')->nullable();
            $table->string('state')->nullable();
            $table->string('rezults')->nullable();
            $table->string('field')->nullable();
            $table->string('info')->nullable();
        });
        Schema::table('grant_obosns', function (Blueprint $table) {
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
        Schema::dropIfExists('grant_obosns');
    }
};
