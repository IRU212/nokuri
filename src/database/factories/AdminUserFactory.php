<?php

namespace Database\Factories;

use App\Models\AdminRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminUser>
 */
class AdminUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $admin_role = new AdminRole();
        $first_name = fake()->firstName();
        $last_name = fake()->lastName();

        return [
            'name' => "{$first_name} {$last_name}",
            'name_sei' => $first_name,
            'name_mei' => $last_name,
            'email' => fake()->email(),
            'password' => Hash::make(Str::random(20) . 12),
            'role' => rand($admin_role->min('id'), $admin_role->max('id'))
        ];
    }
}
