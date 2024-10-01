<?php

namespace Database\Seeders;

use App\Models\User;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nik' => '3175100803060004',
                'usernmae' => 'Hanif Fathurrahman',
                'password' => 'admin',
                'email'=>'haniffathur02@gmail.com',
                'level' => 'user'
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
