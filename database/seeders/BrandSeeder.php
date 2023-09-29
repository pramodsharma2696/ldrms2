<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use Faker\Provider\Image as ImageProvider;

class BrandSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $faker->addProvider(new ImageProvider($faker));
        foreach (range(1, 10) as $index) {
            $imageName = md5($faker->word) . "." . 'jpg'; // Example custom image name generation
    
            // Move the uploaded file to the desired directory
            $sourceImagePath = $faker->image(null, 800, 600); // Generate a random image
            $destinationImagePath = public_path("images") . '/' . $imageName;
    
            copy($sourceImagePath, $destinationImagePath);
            DB::table('brands')->insert([
                'BrandName' => $faker->company, // Generate a random company name
                'BrandLogo' => $imageName, // You can set this to null or add logic to seed logos if needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
