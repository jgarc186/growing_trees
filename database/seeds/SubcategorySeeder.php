<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            '1' => 'Laravel',
            '2' => 'Vue JS'
        ];

        foreach ($subcategories as $category => $subcategory) {
            DB::table('sub_categories')->insert([
                'category_id' => $category,
                'title' => $subcategory,
                'headline' => $subcategory,
                'description' => ''
            ]);
        }
    }
}
