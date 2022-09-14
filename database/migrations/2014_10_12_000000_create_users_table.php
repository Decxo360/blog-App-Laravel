<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); //id Auto Incremental
            $table->string('name'); // Varchar
            $table->string('email')->unique(); // Varchar Valor Unico, con una coma se puede indicar cuantos caracateres se necesita
            $table->timestamp('email_verified_at')->nullable(); //Valor null
            $table->string('password'); //Varchar
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
