<?php

use Illuminate\Database\Seeder;
use App\category;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::create([
            'name' => 'Category I',
            'slug' => str_slug('category i')
        ]);
        category::create([
            'name' => 'Category II',
            'slug' => str_slug('category ii')
        ]);
    }
}
