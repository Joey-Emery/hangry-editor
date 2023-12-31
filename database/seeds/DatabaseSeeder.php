<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProjectSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(ComponentCategorySeeder::class);
        $this->call(ComponentSeeder::class);
        $this->call(PageComponentSeeder::class);
    }
}
