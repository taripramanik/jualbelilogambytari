<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Admin;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id = "1000";
        $user->name = "tari";
        $user->email = "tari@banksampah.com";
        $user->no_telephone = "02213131";
        $user->alamat = "jalan jalan";
        $user->password = bcrypt("tari");
        $user->level = 0;
        $user->pin = 1234;

        $user->save();

        $admin = new Admin();

        $admin->name = "admin";
        $admin->email = "admin@admin.com";
        $admin->password = bcrypt("admin");

        $admin->save();
    }
}
