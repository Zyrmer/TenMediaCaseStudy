<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
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
            'username' => 'admin',
            'email'=> 'admin@web.de',
            'mobile'=> '015712345678',
            'password'=> 'password',
            'role'=> 'admin',
        ]);

        User::factory()->create([
            'username' => 'user',
            'email'=> 'user@web.de',
            'mobile'=> '015712345678',
            'password'=> 'password',
            'role'=> 'user',
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
            'title' => 'Developer',
            'description' => 'Wir suchen einen Developer.',
            'location' => 'Berlin',
            'salary' => 100,
            'company_id' => 1,
            'category_id' => 1,
        ]);
        

        $exampleImages = [
            'Aufgabenstellung.jpg',
            'sitemap.png',
            'modelle.png',
            'ER_modell.png',
            'benutzerrechte.png',
        ];

        foreach ($exampleImages as $fileName) {
             if ($fileName === 'Aufgabenstellung.jpg') {
                $beschreibung = 'Die aufgabenstellung von TenMedia';
            } else if ($fileName === 'sitemap.png') {
                $beschreibung = 'Aufgabe 1a';
            } else if ($fileName === 'modelle.png') {
                $beschreibung = 'Aufgabe 1b';
            } else if ($fileName === 'ER_modell.png') {
                $beschreibung = 'Aufgabe 1c';
            } else {
                $beschreibung = 'Aufgabe 1d';
            }
        $storedPath = Storage::disk('public')->putFileAs(
            'images',                                
            base_path('resources/exampleImages/' . $fileName), 
            $fileName
        );

        Image::factory()->create([
            'title' => pathinfo($fileName, PATHINFO_FILENAME),
            'description' => pathinfo($fileName, PATHINFO_FILENAME) . ': ' . $beschreibung,
            'image' => $storedPath,
        ]);
}
       
        
        }
}
