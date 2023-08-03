<?php

use Illuminate\Database\Seeder;

class PageComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_components')->insert([
            'page_id' => 1,
            'component_id' => 1,
            'contents' => json_encode([
                'title' => 'Testaurant',
                'link_icon' => 'far fa-bars',
                'background_colour' => '#307ff4',
            ]),
            'render_order' => 1,
        ]);

        DB::table('page_components')->insert([
            'page_id' => 1,
            'component_id' => 2,
            'contents' => null,
            'render_order' => 2,
        ]);
    }
}
