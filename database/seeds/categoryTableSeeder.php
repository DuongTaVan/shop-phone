<?php

use Illuminate\Database\Seeder;

class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		['cate_name'=>'iphone','cate_slug'=>Str::slug('iphone')],
    		['cate_name'=>'samsung','cate_slug'=>Str::slug('samsung')]

    	];
        DB::table('vp_category')->insert($data);
    }
}
