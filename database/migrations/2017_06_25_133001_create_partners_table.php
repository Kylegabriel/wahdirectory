<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('desig_id')->unsigned()->nullable();
            $table->integer('org_id')->unsigned()->nullable();
            $table->string('last_name',50);
            $table->string('first_name',50);
            $table->string('middle_name',50);
            $table->char('suffix_name',5);
            $table->char('province',15)->nullable();
            $table->char('gender',1);
            $table->string('primary_contact',11)->nullable();
            $table->string('secondary_contact',11)->nullable();
            $table->string('email',50)->nullable();
            $table->string('secondary_email',50)->nullable();
            $table->date('birthdate')->nullable();
            $table->char('is_active',1);
            $table->timestamps();

            $table->foreign('desig_id')->references('id')->on('designations');
            $table->foreign('org_id')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partners', function ($table) {
            $table->dropForeign('partners_desig_id_foreign');
        });
        Schema::drop('partners');
    }
}
