<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('site_id')->unsigned();
            // $table->char('site',1);
            $table->char('region_code',2);
            $table->char('province_code',4);
            $table->char('muncity_code',6);
            $table->char('brgy_code',10);
            $table->string('last_name',50);
            $table->string('first_name',50);
            $table->string('middle_name',50);
            $table->char('suffix_name',5);
            $table->char('gender',1);
            $table->string('primary_contact',11)->nullable();
            $table->string('secondary_contact',11)->nullable();
            $table->string('email',50)->nullable();
            $table->string('secondary_email',50)->nullable();
            $table->date('birthdate')->nullable();
            $table->char('is_active',1);
            $table->char('status',1);
            $table->text('reasons')->nullable();          
            $table->timestamps();
    
            $table->foreign('site_id')->references('id')->on('sites_designation');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function ($table) {
            $table->dropForeign('sites_site_id_foreign');
        });
        Schema::drop('sites');
    }
}
