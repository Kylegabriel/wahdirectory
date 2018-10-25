<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('organization');

        });

        DB::table('organizations')
        ->insert([
          ['id' => '1', 'organization' => 'QualComm Wireless Reach'],
          ['id' => '2', 'organization' => 'United States Agency for International Development'],
          ['id' => '3', 'organization' => 'Wireless Access for Health/Tarlac Provincial Health Office'],
          ['id' => '4', 'organization' => 'Provincial Government of Tarlac'],
          ['id' => '5', 'organization' => 'CHD-CAR'],
          ['id' => '6', 'organization' => 'Department of Health'],
          ['id' => '7', 'organization' => 'CBO - MITD'],
          ['id' => '8', 'organization' => 'LH']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('organizations');
    }
}
