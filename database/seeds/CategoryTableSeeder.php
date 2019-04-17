<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
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
                'name'=>'Áo phông',
                'slug'=>str_slug('Áo phông'),
                'alias'=>'Ao phong'
            ],
            [
                'name'=>'Áo sơ mi',
                'slug'=>str_slug('Áo sơ mi'),
                'alias'=>'Ao so mi'
            ]
        ];
        DB::table('category')->insert($data);
    }
}
