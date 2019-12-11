<?php

namespace App\Http\Controllers;

use App\Article;
use App\SubCategory;

class ArticlesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SubCategory $subCategory)
    {
        $subCategories = $subCategory->all();

        return view('article.create', compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validatedData = request()->validate([
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.index', compact('article'));
    }

    /**
     * Find article based on $id provided and also find subcategory and get all the subcategories.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $subcategory = SubCategory::find($article->sub_category_id);
        $subcategories = SubCategory::all();

        return view('article.edit', compact([
            'article',
            'subcategory',
            'subcategories'
        ]));
    }

    /**
     * Find article based on $id and updated it with the validated request data.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(int $id)
    {
        $validatedData = request()->validate([
            'title' => 'required|unique:categories|max:255',
            'sub_category_id' => 'required',
            'author' => 'required',
            'headline' => 'required|unique:categories|max:255',
            'description' => 'required',
            'copy' => 'required'
        ]);

        Article::find($id)->update($validatedData);

        return redirect('/')->with('success', "Hooray, you just updated {$validatedData['headline']} Article!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();

        return redirect('/')->with('success', "Hooray, you just deleted an Article!");
    }
}
