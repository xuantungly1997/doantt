<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customer')->insert([
            array(
                'name' => 'XuanTung',
                'email' => 'xuantung@gmail.com',
                'password' => bcrypt('12345678'),
                'phone' => '098989898',
                'address' =>'Lục yên - Yên Bái',
                'birthday' =>'2018-01-01',
            ),
            array(
                'name' => 'HongAnh',
                'email' => 'Honganh@gmail.com',
                'password' => bcrypt('12345678'),
                'phone' => '098989898',
                'address' =>'Hà Nội',
                'birthday' =>'2018-01-02',
            )
        ]);
    }
}
