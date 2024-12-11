<?php

namespace Tests\Feature;

use Database\Seeders\UserSeed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->seed(UserSeed::class);
    }

    /**
     * test para verificar que un usuario existente pueda loggear
     */
    public function test_exists_user_can_login(): void
    {
        #teniendo estas creedenciales:
        $credentials = ["email"=>"miguel@example.com", "password"=>"password"];

        #haciendo peticion:
        $response = $this->postJson("api/login",$credentials);

        #resultado:
        $response->assertStatus(200);
        $response->assertJsonStructure(["data"=>["access_token"]]);
    }

    /**
     * test para verificar que un usuario que no exista no pueda loggear
     */
    public function test_non_exists_user_cannot_login(): void
    {
        #teniendo estas creedenciales:
        $credentials = ["email"=>"example@example.com", "password"=>"password2"];

        #haciendo peticion:
        $response = $this->postJson("api/login",$credentials);

        #resultado:
        $response->assertStatus(422);
        $response->assertJsonFragment(["status"=>422, "message" => "The selected email is invalid."]);
    }
}
