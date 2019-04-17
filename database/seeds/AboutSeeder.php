<?php

use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data=[
            [
                'email'=>'xuantung@gmail.com',
                'phone'=>'0123456789',
                'address'=>'Yên bái'
            ]
        ];
        DB::table('about')->insert($data);
    }
}
