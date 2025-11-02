<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            CategorySeeder::class,
            JobSeeder::class,
        ]);

        User::factory()->create([
            'username' => 'Tim',
            'email'=> 'tim@gmx.de',
            'mobile'=> '015712345678',
            'password'=> '12345678',
            'role'=> 'admin',
        ]);
  
        Company::Factory()->create([
            'name' => 'Arbeitgeber AG',
            'description' => 'Wir gut :D',
            'website' => 'HierSindWir.de',
        ]);
        
        Category::Factory()->create([
            'name'=> 'categoryNamen',
            'description'=> 'categoryDescription',
        ]);
        
        Job::Factory()->create([
            'title' => 'Frontend Developer',
            'description' => 'Wir suchen einen Developer.',
            'location' => 'Berlin',
            'salary' => 100,
            'company_id' => 1,
            'category_id' => 1,
        ]);

    }
}
