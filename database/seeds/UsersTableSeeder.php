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
       	$data = [
            'name'          => 'KAP',
            'email'         => 'kap@gmail.com',
            'alamat'         => 'Wonogiri',
            'no_telp'         => '085201251132',
            'password'      => bcrypt('12345'),
            'photo'         => 'photo/rocNKNEBknenM3g1GHamxaz4nVKcHkPZuoBHKANY.jpeg',
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}
