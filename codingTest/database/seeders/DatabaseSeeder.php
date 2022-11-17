<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create([
            'name'  => 'Mr.John',
            'posisi'=> 'Senior HRD',
        ]);
        \App\Models\User::factory()->create([
            'name'  => 'Mrs.Lee',
            'posisi'=> 'HRD',
        ]);


        \App\Models\Calon::factory()->create([
            'name'  => fake()->name(),
            'education'=> 'UGM Yogyakarta',
            'birthday'=> fake()->date(),
            'experience'=> fake()->numberBetween(0,25),
            'lastPosition'=> 'CEO',
            'appliedPosition'=> 'Senior Development',
            'top5'=> 'Laravel, Mysql, PostgreSQL, Codeigniter, Java',
            'email'=> fake()->email(),
            'phone'=> fake()->phoneNumber(),
            'resume'=> '',
        ]);
        \App\Models\Calon::factory()->create([
            'name'  => fake()->name(),
            'education'=> 'UGM Yogyakarta',
            'birthday'=> fake()->date(),
            'experience'=> fake()->numberBetween(0,25),
            'lastPosition'=> 'CEO',
            'appliedPosition'=> 'Senior Development',
            'top5'=> 'Laravel, Mysql, PostgreSQL, Codeigniter, Java',
            'email'=> fake()->email(),
            'phone'=> fake()->phoneNumber(),
            'resume'=> '',
        ]);
        \App\Models\Calon::factory()->create([
            'name'  => fake()->name(),
            'education'=> 'UGM Yogyakarta',
            'birthday'=> fake()->date(),
            'experience'=> fake()->numberBetween(0,25),
            'lastPosition'=> 'CEO',
            'appliedPosition'=> 'Senior Development',
            'top5'=> 'Laravel, Mysql, PostgreSQL, Codeigniter, Java',
            'email'=> fake()->email(),
            'phone'=> fake()->phoneNumber(),
            'resume'=> '',
        ]);
        \App\Models\Calon::factory()->create([
            'name'  => fake()->name(),
            'education'=> 'UGM Yogyakarta',
            'birthday'=> fake()->date(),
            'experience'=> fake()->numberBetween(0,25),
            'lastPosition'=> 'CEO',
            'appliedPosition'=> 'Senior Development',
            'top5'=> 'Laravel, Mysql, PostgreSQL, Codeigniter, Java',
            'email'=> fake()->email(),
            'phone'=> fake()->phoneNumber(),
            'resume'=> '',
        ]);
        \App\Models\Calon::factory()->create([
            'name'  => fake()->name(),
            'education'=> 'UGM Yogyakarta',
            'birthday'=> fake()->date(),
            'experience'=> fake()->numberBetween(0,25),
            'lastPosition'=> 'CEO',
            'appliedPosition'=> 'Senior Development',
            'top5'=> 'Laravel, Mysql, PostgreSQL, Codeigniter, Java',
            'email'=> fake()->email(),
            'phone'=> fake()->phoneNumber(),
            'resume'=> '',
        ]);
    }
}
