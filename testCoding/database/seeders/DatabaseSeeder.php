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

        \App\Models\User::factory()->create([
            'name' => 'Mr. John',
            'email' => 'Mr.John@example.com',
            'posisi' => 'Senior HRD',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mrs. Lee',
            'email' => 'Mrs.Lee@example.com',
            'posisi' => 'HRD',
        ]);

        \App\Models\Calon::factory()->create([
            'name'      => fake()->name(),
            'education' => fake()->email(),
            'birthday' => fake()->date('Y-m-d', '2000-01-01'),
            'experience' => fake()->numberBetween(0,50),
            'lastPosition' => 'CEO',
            'appliedPosition' => 'Senior PHP Development',
            'top5' => 'Laravel, Mysql, PostgreSQL, Codeigniter, Java',
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'resume' => '',
        ]);           
        \App\Models\Calon::factory()->create([
            'name'      => fake()->name(),
            'education' => fake()->email(),
            'birthday' => fake()->date('Y-m-d', '2000-01-01'),
            'experience' => fake()->numberBetween(0,50),
            'lastPosition' => 'CEO',
            'appliedPosition' => 'Senior PHP Development',
            'top5' => 'Laravel, Mysql, PostgreSQL, Codeigniter, Java',
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'resume' => '',
        ]);           
        \App\Models\Calon::factory()->create([
            'name'      => fake()->name(),
            'education' => fake()->email(),
            'birthday' => fake()->date('Y-m-d', '2000-01-01'),
            'experience' => fake()->numberBetween(0,50),
            'lastPosition' => 'CEO',
            'appliedPosition' => 'Senior PHP Development',
            'top5' => 'Laravel, Mysql, PostgreSQL, Codeigniter, Java',
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'resume' => '',
        ]);           
    }
}
