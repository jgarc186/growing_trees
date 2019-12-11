<?php

namespace App\Http\Controllers;

use App\Article;
use App\SubCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Get all the article based that the user selected based on it's id and show it the the user
     *
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {
        return view('article.index', compact('article'));
    }

    /**
     * Get all the subcategories in the db and use them for the select form
     *
     * @param SubCategory $subCategory
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(SubCategory $subCategory)
    {
        $subCategories = $subCategory->all();

        return view('article.create', compact('subCategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:categories|max:255',
            'sub_category_id' => 'required',
            'author' => 'required',
            'headline' => 'required|unique:categories|max:255',
            'description' => 'required',
            'copy' => 'required'
        ]);

        Article::create($validatedData);

        return redirect('/')->with('success', "Hooray, you just created a NEW article!");
    }
}
