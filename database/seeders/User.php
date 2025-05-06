<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'krishnan14',
            'email' => 'krishnan14@gmail.com',
            'password' => Hash::make('krishnan')
        ];
        ModelsUser::create($user);
    }
}
