<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = array(
            array(
                'name' => 'Maarten',
                'email' => 'maartendejager@gmail.com',
                'password' => Hash::make('password')
            )
        );

        DB::table('users')->insert($users);
    }
}
