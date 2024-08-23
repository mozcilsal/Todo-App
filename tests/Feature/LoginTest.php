<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /** @test  */
    public function a_user_can_get_main(): void
    {
     $response=$this->get('/main');
     
     $response->assertStatus(200);
    }

    /** @test  */
    public function a_user_can_post_main(): void
    {
        $response = $this->post('/login', [
            'username' => 'admin',
            'password' => 'admin',
        ]);

        $response->assertStatus(302);
        

    }
}

