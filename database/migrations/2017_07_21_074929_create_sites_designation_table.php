<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesDesignationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites_designation', function (Blueprint $table) {
              $table->char('sites_code',20);
              $table->string('sites_desc');

              $table->primary('sites_code');
            });

        DB::table('sites_designation')
          ->insert([
            ['sites_code' => 'OIC', 'sites_desc' => 'Officer In Charge'],
            ['sites_code' => 'MO IV', 'sites_desc' => 'Medical Officer IV'],
            ['sites_code' => 'STAT I', 'sites_desc' => 'Statistician II'],
            ['sites_code' => 'NURS I', 'sites_desc' => 'Nurse I'],
            ['sites_code' => 'NURS II', 'sites_desc' => 'Nurse II'],
            ['sites_code' => 'NURS III', 'sites_desc' => 'Nurse III'],
            ['sites_code' => 'NURS IV', 'sites_desc' => 'Nurse IV'],
            ['sites_code' => 'NURS V', 'sites_desc' => 'Nurse V'],
            ['sites_code' => 'MIDW I', 'sites_desc' => 'Midwife I'],
            ['sites_code' => 'MIDW II', 'sites_desc' => 'Midwife II'],
            ['sites_code' => 'MIDW III', 'sites_desc' => 'Midwife III'],
            ['sites_code' => 'ADMOFFR I', 'sites_desc' => 'Admin Officer I'],
            ['sites_code' => 'ADMOFFR II', 'sites_desc' => 'Admin Officer II'],
            ['sites_code' => 'ADMOFFR III', 'sites_desc' => 'Admin Officer III'],
            ['sites_code' => 'MIDW IV', 'sites_desc' => 'Midwife IV'],
            ['sites_code' => 'DENT I', 'sites_desc' => 'Dentist I'],
            ['sites_code' => 'DENT II', 'sites_desc' => 'Dentist II'],
            ['sites_code' => 'DENT III', 'sites_desc' => 'Dentist III'],
            ['sites_code' => 'DENTAID', 'sites_desc' => 'Dental Aide'],
            ['sites_code' => 'DCW I', 'sites_desc' => 'Day Care Worker I'],
            ['sites_code' => 'MEDTECH I', 'sites_desc' => 'Medical Technologist I'],
            ['sites_code' => 'MEDTECH II', 'sites_desc' => 'Medical Technologist II'],
            ['sites_code' => 'CONTRCTMEDTECH I', 'sites_desc' => 'Contractual Medical Technologist'],
            ['sites_code' => 'PPO I', 'sites_desc' => 'Provincial Populations Officer I'],
            ['sites_code' => 'PPO II', 'sites_desc' => 'Provincial Populations Officer II'],
            ['sites_code' => 'PPO III', 'sites_desc' => 'Provincial Populations Officer II'],
            ['sites_code' => 'PPO IV', 'sites_desc' => 'Provincial Populations Officer IV'],
            ['sites_code' => 'HEPO I', 'sites_desc' => 'Health Eduation Providing Officer I'],
            ['sites_code' => 'HEPO II', 'sites_desc' => 'Health Eduation Providing Officer II'],
            ['sites_code' => 'HEPO III', 'sites_desc' => 'Health Eduation Providing Officer III'],
            ['sites_code' => 'CO', 'sites_desc' => 'Computer Operator'],
            ['sites_code' => 'BHW', 'sites_desc' => 'Barangay Health Worker'],
            ['sites_code' => 'NDP', 'sites_desc' => 'Nurses Deployment Program'],
            ['sites_code' => 'RHM', 'sites_desc' => 'Rural Health Midwife'],
            ['sites_code' => 'RHMPP', 'sites_desc' => 'RHMPP'],
            ['sites_code' => 'PHN', 'sites_desc' => 'Public Health Nurse'],
            ['sites_code' => 'PHN I', 'sites_desc' => 'Public Health Nurse I'],
            ['sites_code' => 'PHN II', 'sites_desc' => 'Public Health Nurse II'],
            ['sites_code' => 'PHN III', 'sites_desc' => 'Public Health Nurse III'],
            ['sites_code' => 'PHN IV', 'sites_desc' => 'Public Health Nurse IV'],
            ['sites_code' => 'LID', 'sites_desc' => 'LYING-IN.DOH'],
            ['sites_code' => 'RHP', 'sites_desc' => 'Rural Health Physician'],
            ['sites_code' => 'PHARM', 'sites_desc' => 'Pharmacist'],
            ['sites_code' => 'DEM I', 'sites_desc' => 'DEMO I'],
            ['sites_code' => 'DEM II', 'sites_desc' => 'DEMO II'],
            ['sites_code' => 'I.T', 'sites_desc' => 'Information Technology'],
            ['sites_code' => 'MHO', 'sites_desc' => 'Municipal Health Officer'],
            ['sites_code' => 'RNH', 'sites_desc' => 'RN HEALS'],
            ['sites_code' => 'RSI', 'sites_desc' => 'Rural Sanitaty Inspector'],
            ['sites_code' => 'RSI II', 'sites_desc' => 'Rural Sanitaty Inspector II'],
            ['sites_code' => 'JOWNURS', 'sites_desc' => 'JOW Nurse'],
            ['sites_code' => 'JOWMIDW', 'sites_desc' => 'JOW Midwife'],
            ['sites_code' => 'JOAA', 'sites_desc' => 'Job Order Admin Aide'],
            ['sites_code' => 'VOLNURS', 'sites_desc' => 'Volunteer Nurse'],
            ['sites_code' => 'PHA', 'sites_desc' => 'Public Health Associate'],
            ['sites_code' => 'UHCI', 'sites_desc' => 'UHCI'],
            ['sites_code' => 'PHO', 'sites_desc' => 'Provincial Health Office'],
            ['sites_code' => 'CAO', 'sites_desc' => 'Chief Administrative Officer'],
            ['sites_code' => 'DNS', 'sites_desc' => 'District Nurse Supervisor'],
            ['sites_code' => 'ADM VI', 'sites_desc' => 'Admin Aide VI'],
            ['sites_code' => 'DE', 'sites_desc' => 'Data Encoder'],
            ['sites_code' => 'PHILHSTAF', 'sites_desc' => 'Philhealth Staff'],
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sites_designation');
    }
}
