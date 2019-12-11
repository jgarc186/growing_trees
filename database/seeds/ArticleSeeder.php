<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
            '1' => 'Seven Tips to Learn Laravel More Effectively',
            '2' => 'How much JavaScript do I need to know before learning Vue.js?'
        ];

        foreach ($articles as $subcategoryId => $subcategory) {
            DB::table('articles')->insert([
                'sub_category_id' => $subcategoryId,
                'title' => $subcategory,
                'headline' => $subcategory,
                'author' => '',
                'description' => '',
                'copy' => ''
            ]);
        }
    }
}
