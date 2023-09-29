<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use Faker\Provider\Image as ImageProvider;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run()
{
    $faker = Faker::create();
    $faker->addProvider(new ImageProvider($faker));
    foreach (range(1, 10) as $index) {
        $imageName = md5($faker->word) . "." . 'jpg'; 

        $sourceImagePath = $faker->image(null, 800, 600); // Generate a random image
        $destinationImagePath = public_path("products/images") . '/' . $imageName;

        copy($sourceImagePath, $destinationImagePath);

        DB::table('products')->insert([
            'Type' => $faker->randomElement(['Laptop', 'Desktop']),
            'BrandID' => $faker->numberBetween(1, 5), 
            'ProductName' => $faker->jobTitle,
            'Processor' => $faker->word,
            'Screen' => $faker->word,
            'RAM' => $faker->word,
            'Storage' => $faker->word,
            'Charges' => $faker->word,
            'RentalPrice' => $faker->randomFloat(2, 100, 1000), 
            'ProductModel' => $faker->word,
            'ProductDescription' => $faker->sentence, 
            'Image' => $imageName, 
            'Image1' => $imageName,
            'Image2' => $imageName,
            'Image3' => $imageName,
            'Image4' => $imageName,
            'Image5' => $imageName,
            'created_at' => now(), 
        ]);
    }
}

}
