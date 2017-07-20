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
            $table->integer('course_id')->unsigned();
            $table->integer('school_id')->unsigned();
            //$table->integer('papers_id')->unsigned();
            $table->string('primary_contact',12);
            $table->string('email',50);
            $table->date('date_start');
            $table->date('date_end');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('course');
            $table->foreign('school_id')->references('id')->on('school');
            //$table->foreign('papers_id')->references('id')->on('papers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('intern', function ($table) {
            $table->dropForeign('intern_course_id_foreign');
            $table->dropForeign('intern_school_id_foreign');
            //$table->dropForeign('intern_papers_id_foreign');
        });
        Schema::drop('intern');
    }
}
