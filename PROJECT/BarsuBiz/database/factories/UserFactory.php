<?php

namespace Database\Factories;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        Artisan::call('config:clear');
        $faker = Faker\Factory::create();
        return [
            'name' => fake()->regexify('[A-Za-z0-9]{' . mt_rand(4, 11) . '}'),
            'email' => $faker->email,
            'email_verified_at' => null,
            'password' => '123123', // password
            'birthdate'=>now(),
            'userToken'=>Str::random(60),
            'Role'=>'User',
        ];
        
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
