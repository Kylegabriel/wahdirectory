<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->char('role_id',15);
            $table->string('role_name');

            $table->primary('role_id');
        });

        DB::table('user_role')
        ->insert([
            ['role_id' => 'PRES', 'role_name' => 'President'],
            ['role_id' => 'VP', 'role_name' => 'Vice President'],
            ['role_id' => 'BOT', 'role_name' => 'Board of Trustee'],
            ['role_id' => 'TRES/BOT', 'role_name' => 'Treasurer/BOT'],
            ['role_id' => 'CORSEC', 'role_name' => 'Corporate Secretary'],
            ['role_id' => 'EXECDIR', 'role_name' => 'Executive Director'],
            ['role_id' => 'IT', 'role_name' => 'IT Consultant'],
            ['role_id' => 'SP', 'role_name' => 'SP for Advocacy & Operations'],
            ['role_id' => 'SPDIG', 'role_name' => 'SP for Digital Health Programs'],
            ['role_id' => 'SMO', 'role_name' => 'Staff Management Officer'],
            ['role_id' => 'HPP', 'role_name' => 'Health Program Partner'],
            ['role_id' => 'NSP', 'role_name' => 'Network & System Partner'],
            ['role_id' => 'PIP', 'role_name' => 'Platform & Innovation Partner'],
            ['role_id' => 'NONE', 'role_name' => 'NONE'],
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('user_role');
    }
}
