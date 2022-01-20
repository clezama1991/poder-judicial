<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
				'name' => 'Admin',
				'email' => 'admin@admin.com',
				'rol' => 'admin',
	            'password' => Hash::make('admin')
            ],
        	[
				'name' => 'Usuario 1',
				'email' => 'usuario1@usuarios.com',
				'rol' => 'user',
	            'password' => Hash::make('usuario1')
        	],
        	[
				'name' => 'Usuario 2',
				'email' => 'usuario2@usuarios.com',
				'rol' => 'user',
	            'password' => Hash::make('usuario2')
        	]
    	]);
    }
}
