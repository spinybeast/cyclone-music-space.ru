<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name' => 'admin',
            'login'    => 'admin',
            'password' => Hash::make('pitonmikron'),
        ));
    }

}
