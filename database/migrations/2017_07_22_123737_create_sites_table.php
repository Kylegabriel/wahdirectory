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
            $table->char('designation',15)->nullable();
            $table->char('region_code',2);
            $table->char('province_code',4);
            $table->char('muncity_code',6);
            $table->string('last_name',50);
            $table->string('first_name',50);
            $table->string('middle_name',50)->nullable();
            $table->char('suffix_name',5)->nullable();
            $table->char('gender',1)->nullable();
            $table->string('primary_contact',11)->nullable();
            $table->string('secondary_contact',11)->nullable();
            $table->string('email',50)->nullable();
            $table->string('secondary_email',50)->nullable();
            $table->date('birthdate')->nullable();
            $table->char('is_active',1)->nullable();
            $table->char('site',1)->nullable();
            $table->char('status',1)->nullable();
            $table->timestamps();

            $table->foreign('region_code')->references('region_code')->on('lib_region');
            $table->foreign('province_code')->references('province_code')->on('lib_province');
            $table->foreign('muncity_code')->references('muncity_code')->on('lib_muncity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function($table) {
          $table->dropForeign('sites_region_code_foreign');
          $table->dropForeign('sites_province_code_foreign');
          $table->dropForeign('sites_muncity_code_foreign');
        });
        Schema::drop('sites');
    }
}
