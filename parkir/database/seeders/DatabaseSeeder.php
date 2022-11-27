<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use PharIo\Manifest\Email;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'idPegawai' => 'ID1234',
            'email' => 'test@gmail.com',
            'level' => 'user',
            'password' => bcrypt('password'), //password
            'remember_token'    => Str::random(10)
        ]);

        \App\Models\User::factory()->create([
            'idPegawai' => 'ID12345',
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'password' => bcrypt('admin'), //password
            'remember_token'    => Str::random(10)
        ]);

        \App\Models\Pegawai::create([
            'id' => 'ID1234',    
            'nama'  => fake()->name()    ,    
            'jabatan' => 'Penjaga Parkir',
            'tglLahir'=> fake()->date()
        ]);
    }
}
