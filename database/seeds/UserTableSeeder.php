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
        $data = [

        	['email' => 'Duongtv2712@gmail.com','password' => bcrypt('12345') , 'level' =>1],
        	['email' => 'Duongga99@gmail.com','password' => bcrypt('123456'), 'level' =>0],
        ];
        DB::table('vp_users')->insert($data);

    }
}
