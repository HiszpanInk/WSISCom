<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $newUser = new User();
        $newUser->id = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $newUser->username = "AdamNowak007";
        $newUser->name = "Adam";
        $newUser->surname = "Nowak";
        $newUser->password = Hash::make("loremipsum123");
        $newUser->save();
    }
}
