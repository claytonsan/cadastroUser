<?php
namespace Tests\Feature;

//use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User; 

class UserTest extends TestCase
{
    //pode ser subistituido pelo DatabaseTransactions, pois ele mantendo o BD, para isso basta descomentar a linha 4
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        //craindo dados para teste
        $userData = [
            'nomeCompleto' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'confirmarSenha' => 'password123',
        ];

        $response = $this->postJson(route('user.store'), $userData);

        $response->assertStatus(200);  
        $response->assertJson(['success' => true]);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $this->assertTrue(Hash::check('password123', User::first()->password));
    }

}
