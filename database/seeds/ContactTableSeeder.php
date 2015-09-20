<?php

use App\Contact;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        if(!File::exists('public/upload/images/')) {
            File::makeDirectory('public/upload/images/', 775, true);
        }

        for ($i = 0; $i < 20; $i++) {
            Contact::create([
                "name" => $faker->name,
                "phone" => $faker->phoneNumber,
                "image" => $faker->image('public/upload/images', 200, 200),
                "user_id" => 1,
                "sort" => 0,
            ]);
        }
    }
}
