<?php

namespace Tests\Unit;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use WithoutMiddleware;


class CabinetTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        
        $user = \App\Models\User::factory()->count(3)->create();
    
    foreach($user as $user1){
        $this->actingAs($user1);
        $response = $this->get('/cabinet');
       $response->assertStatus(302);


    }
    }
}
