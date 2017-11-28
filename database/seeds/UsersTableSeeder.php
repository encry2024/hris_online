<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array(
                array(
                    'name' => 'Test Admin',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('1234'),
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s')
                )
            )
        );
    }
}
