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
            $table->string('last_name',50);
            $table->string('first_name',50);
            $table->string('middle_name',50);
            $table->string('suffix_name')->nullable();
            $table->char('gender',1)->nullable();
            $table->string('designation')->nullable();
            $table->string('primary_contact',11)->nullable();
            $table->string('secondary_contact',11)->nullable();
            $table->string('email',50)->nullable();
            $table->string('secondary_email',50)->nullable();
            $table->string('username',50);
            $table->string('password');
            $table->date('birthdate')->nullable();
            $table->date('datehired')->nullable();
            $table->char('is_active',1);
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
