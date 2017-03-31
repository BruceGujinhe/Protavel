<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 20) as $index) {
            if (env('FAKER_IMAGE_SAVE')) {
                $imgUrl = $faker->image(storage_path('app/uploads/avatars'), 300, 300, 'people');
                $imgUrl = strstr($imgUrl, 'uploads/avatars');
            } else {
                $imgUrl = $faker->imageUrl(300, 300, 'people');
            }

            $data[] = [
                'nickname'      =>  $faker->name(),
                'avatar'        =>  $imgUrl,
                'email'         =>  $faker->email(),
                'phone'         =>  $faker->phoneNumber(),
                'password'      =>  bcrypt('Protavel2017'),
                'created_at'    =>  $faker->dateTimeThisMonth(),
                'updated_at'    =>  $faker->dateTimeThisMonth(),
            ];
        }

        \App\User::insert($data);
    }
}
