<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase; // Asegúrate de incluir este trait

    public function testSePuedeObtenerUnListadoUsuarios(){
        
        $users = User::factory(5)->create();

        $response = $this->get('/users');

        $response->assertStatus(200);

        foreach ($users as $user) {
            $response->assertSee($user->name);
        }
    }

    public function testSePuedeBorrarUnUsuario()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user->id));
        $this->assertNull(User::find($user->id));

        // Verificar que la respuesta tiene un código de estado adecuado
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }
}
