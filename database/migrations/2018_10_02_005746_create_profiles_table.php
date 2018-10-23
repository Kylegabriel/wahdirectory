<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->string('last_name',50);
            $table->string('first_name',50);
            $table->string('middle_name',50)->nullable();
            $table->string('suffix_name');
            $table->char('gender',1)->nullable();
            $table->string('primary_contact',11)->nullable();
            $table->string('secondary_contact',11)->nullable();
            $table->string('email',50)->nullable();
            $table->string('secondary_email',50)->nullable();
            $table->date('birthdate')->nullable();
            $table->date('datehired')->nullable();
            $table->char('is_active',1);
            $table->string('philhealth',20)->nullable();
            $table->string('tin',20)->nullable();
            $table->string('sss',20)->nullable();
            $table->string('pagibigmidno',20)->nullable();
            $table->string('pagibigrtn',20)->nullable();
            $table->string('mabuhaymilespal',20)->nullable();
            $table->string('getgocebupac',20)->nullable();
            // $table->string('image_url', 100);
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('user_role');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function ($table) {
            $table->dropForeign('profiles_role_id_foreign');
        });
        Schema::drop('profiles');
    }
}
