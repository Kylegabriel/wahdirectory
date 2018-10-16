<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->char('suffix_name',5);
            $table->integer('course_id')->unsigned();
            $table->integer('school_id')->unsigned();
            $table->string('primary_contact',12);
            $table->string('email',50)->nullable();
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->char('is_active',1);
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('course');
            $table->foreign('school_id')->references('id')->on('school');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interns', function ($table) {
            $table->dropForeign('interns_course_id_foreign');
            $table->dropForeign('interns_school_id_foreign');
        });
        Schema::drop('interns');
    }
}
