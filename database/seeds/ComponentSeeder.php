<?php

use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('components')->insert([
            'component_category_id' => 1,
            'name' => "Header Bar",
            'identifier' => "header-bar",
            'default_contents' => json_encode([
                'title' => 'Testaurant',
                'link_icon' => 'far fa-bars',
                'background_colour' => '#307ff4',
            ]),
            'filename' => 'navigation/header-bar',
        ]);

        DB::table('components')->insert([
            'component_category_id' => 1,
            'name' => "Header Hero",
            'identifier' => "header-hero",
            'filename' => 'navigation/header-hero',
        ]);
    }
}
