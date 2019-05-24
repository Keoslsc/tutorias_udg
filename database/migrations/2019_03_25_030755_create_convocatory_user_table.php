<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvocatoryUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatory_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id")->unsigned();
            $table->integer("convocatory_id")->unsigned();
            $table->timestamps();
        });

        Schema::table('convocatory_user', function($table) {
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade');
            $table->foreign('convocatory_id')->references('id')->on('convocatories')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convocatory_user');
    }
}
