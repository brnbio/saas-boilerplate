<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * Class UserFactory
 *
 * @package Database\Factories
 */
class UserFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            User::ATTRIBUTE_NAME              => fake()->name(),
            User::ATTRIBUTE_EMAIL             => fake()->unique()->safeEmail(),
            User::ATTRIBUTE_EMAIL_VERIFIED_AT => now(),
            User::ATTRIBUTE_PASSWORD          => 'password',
            User::ATTRIBUTE_REMEMBER_TOKEN    => Str::random(100),
        ];
    }

    /**
     * @return UserFactory
     */
    public function unverified(): UserFactory
    {
        return $this->state(fn(array $attributes) => [
            User::ATTRIBUTE_EMAIL_VERIFIED_AT => null,
        ]);
    }
}
