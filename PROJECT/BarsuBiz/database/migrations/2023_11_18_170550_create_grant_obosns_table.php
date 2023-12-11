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
            $table->longText('goal')->nullable();
            $table->longText('idea')->nullable();
            $table->longText('struct')->nullable();
            $table->longText('state')->nullable();
            $table->longText('rezults')->nullable();
            $table->longText('field')->nullable();
            $table->longText('info')->nullable();
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
