<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 1,
        ]);
        User::create([
            'name' => 'Restu',
            'email' => 'restu@telkom-ped.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);
        User::create([
            'name' => 'Arief',
            'email' => 'arief@telkom-ped.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);
        User::create([
            'name' => 'Rayhan',
            'email' => 'rayhan@telkom-ped.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);
        User::create([
            'name' => 'Bayu',
            'email' => 'bayu@telkom-ped.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);
    }
}
