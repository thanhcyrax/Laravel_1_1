<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_db')->insert([
            'gia' => str_random(10),
            'ten' => str_random(10).'@gmail.com',
            'ghi_chu' => 'aaa',
        ]);
    }
}
