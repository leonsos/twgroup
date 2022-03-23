<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Super admin',
            'role' =>'1',           
            'email'=>'admin@admin.com',
            'password'=> Hash::make('12345678'),
        ]);
    }
}
