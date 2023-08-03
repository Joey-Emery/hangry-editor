<?php

use Illuminate\Database\Seeder;

class ComponentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('component_categories')->insert([
            'name' => "Navigation",
        ]);
    }
}
