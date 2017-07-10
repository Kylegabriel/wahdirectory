<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->char('designation_id',20);
            $table->string('designation');

            $table->primary('designation_id');
        });

        DB::table('designations')
        ->insert([
          ['designation_id' => 'PROGMNGR','designation' => 'Program Manager'],
          ['designation_id' => 'COP','designation' => 'Chief-of-Party'],
          ['designation_id' => 'SENTECADV','designation' => 'Senior Technical Advisor'],
          ['designation_id' => 'HEASPE','designation' => 'Electronic/Medical-Health Specialist'],
          ['designation_id' => 'PROJASSIST','designation' => 'Project Assistant'],
          ['designation_id' => 'TECHOFF','designation' => 'Technical Officer'],
          ['designation_id' => 'TECHCOOR','designation' => 'Technical Coordinator'],
          ['designation_id' => 'HPC','designation' => 'Health Program Coordinator'],
          ['designation_id' => 'VP','designation' => 'Vice President'],
          ['designation_id' => 'ITCONST','designation' => 'IT Consultant'],
          ['designation_id' => 'STATIS I','designation' => 'Statistician I'],
          ['designation_id' => 'STATIS II','designation' => 'Statistician II'],
          ['designation_id' => 'ADM ASST I','designation' => 'Admin Assistant I'],
          ['designation_id' => 'JO','designation' => 'Job Order'],
          ['designation_id' => 'ISA III','designation' => 'ISA III'],
          ['designation_id' => 'CO I','designation' => 'CO I'],
          ['designation_id' => 'STA','designation' => 'Senior Technical Advisor']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('designations');
    }
}
