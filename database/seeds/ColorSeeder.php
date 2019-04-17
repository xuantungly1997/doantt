<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
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
                'value'=>'green',
            ],
            [
                'value'=>'red',
            ],
            [
                'value'=>'violet',
            ],
            [
                'value'=>'yellow',
            ],
            [
                'value'=>'brown',
            ],
            [
                'value'=>'black',
            ],
            [
                'value'=>'white',
            ]
        ];
        DB::table('color')->insert($data);
    }
}
