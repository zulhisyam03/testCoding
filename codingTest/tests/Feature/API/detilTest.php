<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Calon;

class detilTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_detil(){
        $candidate = Calon::inRandomOrder()->first();

        $this->json('GET','api/candidate/'.$candidate['id'])
            ->assertStatus(200);
                echo "\n". $candidate['name'];
                echo "\n". $candidate['education'];
                echo "\n". $candidate['birthday'];
                echo "\n". $candidate['experience'];
                echo "\n". $candidate['lastPosition'];
                echo "\n". $candidate['appliedPosition'];
                echo "\n". $candidate['top5'];
                echo "\n". $candidate['phone'];
                echo "\n". $candidate['email'];

    }
    public function test_create_candidate(){
        $candidate = Calon::create([
            'name' => 'Test',
            'birthday' => '1995-02-02',
            'education' => 'UGM',
            'experience' => '4',
            'lastPosition' => 'CEO',
            'appliedPosition' => 'Fullstack',
            'top5'  => 'Laravel',
            'email' => 'test@gmail.com',
            'phone' =>  '0877736333'
        ]);

        $this->json('GET','api/candidate')
            ->assertStatus(200);            
    }

    public function test_delete_candidate(){
        $candidate = Calon::inRandomOrder()->first();

        $candidate->update([
            'name' => 'Test',
            'birthday' => '1995-02-02',
            'education' => 'UGM',
            'experience' => '4',
            'lastPosition' => 'CEO',
            'appliedPosition' => 'Fullstack',
            'top5'  => 'Laravel',
            'email' => 'test@gmail.com',
            'phone' =>  '0877736333'
        ]);

        $this->json('PUT','api/candidate/'.$candidate['id'])
            ->assertStatus(200);            
    }
}
