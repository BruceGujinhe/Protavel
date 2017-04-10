<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::lists('id')->toArray();
        $faker = Faker\Factory::create();

        foreach (range(1, 8) as $index) {
            $data[] = [
                'title'         =>      $faker->sentence(2),
                'title'         =>      $faker->sentence(6),
                'link'          =>      '/' . $faker->word(),
                'content'       =>      implode('', $faker->paragraphs(random_int(1, 8))),
                'created_at'    =>      $faker->dateTimeThisMonth(),
                'updated_at'    =>      $faker->dateTimeThisMonth(),
            ];
        }

        \App\Page::insert($data);
    }
}
