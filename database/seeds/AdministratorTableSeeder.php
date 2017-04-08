<?php

use Illuminate\Database\Seeder;

class AdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 5) as $index) {
            if (env('FAKER_IMAGE_SAVE')) {
                $imgUrl = $faker->image(storage_path('app/uploads/avatars'), 300, 300, 'people');
                $imgUrl = strstr($imgUrl, 'uploads/avatars');
            } else {
                $imgUrl = $faker->imageUrl(300, 300, 'people');
            }

            $username = 'protavel' . $index;

            $data[] = [
                'username'      =>  $username,
                'nickname'      =>  $username,
                'avatar'        =>  $imgUrl,
                'email'         =>  $username . '@protobia.tech',
                'phone'         =>  $faker->phoneNumber(),
                'password'      =>  bcrypt('Protavel2017'),
                'created_at'    =>  $faker->dateTimeThisMonth(),
                'updated_at'    =>  $faker->dateTimeThisMonth(),
            ];
        }

        \App\Admin::insert($data);
    }
}
