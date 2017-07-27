<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('lib_region', function (Blueprint $table) {
        $table->engine = 'InnoDB';

        $table->char('region_code',2);
        $table->string('region_name');

        $table->char('site',2);

        $table->primary('region_code');
      });

            DB::table('lib_region')
        ->insert([
          ['site' => 'L','region_code' => '01','region_name' => 'REGION I (Ilocos Region)'],
          ['site' => 'L','region_code' => '02','region_name' => 'REGION II (Cagayan Valley)'],
          ['site' => 'L','region_code' => '03','region_name' => 'REGION III (Central Luzon)'],
          ['site' => 'L','region_code' => '04','region_name' => 'REGION IV-A (CALABARZON)'],
          ['site' => 'L','region_code' => '05','region_name' => 'REGION V (Bicol Region)'],
          ['site' => 'V','region_code' => '06','region_name' => 'REGION VI (Western Visayas)'],
          ['site' => 'V','region_code' => '07','region_name' => 'REGION VII (Central Visayas)'],
          ['site' => 'V','region_code' => '08','region_name' => 'REGION VIII (Eastern Visayas)'],
          ['site' => 'M','region_code' => '09','region_name' => 'REGION IX (Zamboanga Peninsula)'],
          ['site' => 'M','region_code' => '10','region_name' => 'REGION X (Nothern Mindanao)'],
          ['site' => 'M','region_code' => '11','region_name' => 'REGION XI (Davao Region)'],
          ['site' => 'M','region_code' => '12','region_name' => 'REGION XII (Soccsksargen)'],
          ['site' => 'L','region_code' => '13','region_name' => 'NCR - National Capital Region'],
          ['site' => 'L','region_code' => '14','region_name' => 'CAR - Cordillera Administrative Region'],
          ['site' => 'M','region_code' => '15','region_name' => 'ARMM - Autonomous Region in Muslim Mindanao'],
          ['site' => 'M','region_code' => '16','region_name' => 'REGION XIII (Caraga)'],
          ['site' => 'L','region_code' => '17','region_name' => 'REGION IV-B (MIMAROPA)'],
          ['site' => 'V','region_code' => '18','region_name' => 'NIR - Negros Island Region']
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lib_region');
    }
}
