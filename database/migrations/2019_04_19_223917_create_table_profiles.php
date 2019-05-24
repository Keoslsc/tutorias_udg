<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->unique();;
            $table->date('date');
            $table->string('about_me');
            $table->string('cellphone', 15);
            $table->integer('career_id')->unsigned();
            $table->string('G');
            $table->timestamps();
        });

        Schema::table('profiles', function($table) {
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade');
            $table->foreign('career_id')->references('id')->on('careers')
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
        Schema::dropIfExists('profiles');
    }
}
