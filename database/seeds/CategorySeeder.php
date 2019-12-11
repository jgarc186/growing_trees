<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'php' => 'PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.',
            'javascript' => 'Javascript (JS) is a scripting languages, primarily used on the Web. It is used to enhance HTML pages and is commonly found embedded in HTML code. JavaScript is an interpreted language. Thus, it doesn\'t need to be compiled. JavaScript renders web pages in an interactive and dynamic fashion.'
        ];

        foreach ($categories as $category => $description) {
            DB::table('categories')->insert([
                'title' => $category,
                'headline' => $category,
                'description' => $description
            ]);
        }
    }
}
