<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Root User',
            'email' => 'root@example.com',
        ]);
    }
}
