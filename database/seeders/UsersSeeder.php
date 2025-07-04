<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData =[
        [
            'name'=>'superadmin',
            'email'=>'superadmin@gmail.com',
            'role'=>'superadmin',
            'password'=>bcrypt('12345')
        ],
        [
            'name'=>'adminperusahaan',
            'email'=>'admin@gmail.com',
            'role'=>'adminperusahaan',
            'password'=>bcrypt('12345')
        ],
        [
            'name'=>'karyawan',
            'email'=>'karyawan@gmail.com',
            'role'=>'karyawan',
            'password'=>bcrypt('12345')
        ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
