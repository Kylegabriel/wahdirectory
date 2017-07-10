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

            $table->char('organization_id',10);
            $table->string('organization');

            $table->primary('organization_id');

        });

        DB::table('organizations')
        ->insert([
          ['organization_id' => 'QUALWR',   'organization' => 'QualComm Wireless Reach'],
          ['organization_id' => 'USAID',    'organization' => 'United States Agency for International Development'],
          ['organization_id' => 'WAH/PGO',  'organization' => 'Wireless Access for Health/Tarlac Provincial Health Office'],
          ['organization_id' => 'PGO',      'organization' => 'Provincial Government of Tarlac'],
          ['organization_id' => 'CHD',      'organization' => 'CHD-CAR'],
          ['organization_id' => 'DOH',  'organization' => 'Department of Health'],
          ['organization_id' => 'CHO-MITD', 'organization' => 'CBO - MITD'],
          ['organization_id' => 'LH',       'organization' => 'LH'],
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
