<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $first_name = fake()->firstName();
        $last_name = fake()->lastName();
        $name = $first_name . ' ' . $last_name;

        return [
            User::FIRST_NAME => $first_name,
            User::LAST_NAME => $last_name,
            User::NAME => $name,
            User::EMAIL => fake()->unique()->safeEmail(),
            User::EMAIL_VERIFIED_AT => now(),
            User::PASSWORD => static::$password ??= Hash::make('password'),
            User::REMEMBER_TOKEN => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            User::EMAIL_VERIFIED_AT => null,
        ]);
    }
}
