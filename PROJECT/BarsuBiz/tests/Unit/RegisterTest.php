<?php
namespace Tests\Unit;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use WithoutMiddleware;
class RegisterTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->withoutMiddleware();
        $user = \App\Models\User::factory()->count(3)->create();
        foreach ($user as $user1) {
        $response = $this->withSession(['_token' => $user1->token])->post('/submit-register', [
            'username' => $user1->name,
            'email' => $user1->email,
            'password' => $user1->password,
            'age'=>$user1->birthdate,
        ]);
        $response;
    }

    foreach($user as $user1){
        $this->assertDatabaseHas('users', [
            'email' => $user1->email,
        ]);
    }
}
    
}
