<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    protected $model = Job::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(3),
            'location' => $this->faker->city(),
            'salary' => $this->faker->numberBetween(300, 9000),

            'company_id' => Company::factory(),
            'category_id' => Category::factory(),
            'users_id' => User::factory(),
        ];
    }
}
