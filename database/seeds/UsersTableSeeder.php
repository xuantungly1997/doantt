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
        //
        DB::table('users')->insert([
            array(
                'name' => 'XuanTung',
                'email' => 'xuantung@gmail.com',
                'password' => bcrypt('12345678'),
                'phone' => '098989898',
                'address' =>'Lục yên - Yên Bái',
                'role' => 1,
                'created_at'=>'2013-03-05 00:00:00'
            ),
            array(
                'name' => 'HongAnh',
                'email' => 'Honganh@gmail.com',
                'password' => bcrypt('12345678'),
                'phone' => '098989898',
                'address' =>'Hà Nội',
                'role' => 0,
                'created_at'=>'2003-03-15 00:00:00'
            )
        ]);
    }
}
