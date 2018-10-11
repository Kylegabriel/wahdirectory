<?php

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
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('suffix_name');
            $table->date('birthdate');
            $table->char('gender',1);
            $table->string('role',50);
            $table->char('is_admin',1);
            $table->string('username');
            $table->string('password', 60);
            $table->string('email');
            $table->string('mobile_number',11);
            $table->char('is_active',1);
            $table->string('designation');
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
        Schema::drop('users');
    }
}
