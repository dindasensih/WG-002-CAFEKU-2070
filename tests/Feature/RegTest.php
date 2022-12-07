<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    public function test_register()
    {
        $response = $this->post('/register',[
            'name'=>'adinda',
            'email'=>'dinnn4@gmail.com',
            'password'=>'aaa11122',
            'password_confirmation'=>'aaa11122',
            'role'=>'admin',
        ]);
        $response->assertRedirect('home');
    }
}
