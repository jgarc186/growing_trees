<?php

namespace App\Http\Controllers;

use App\Article;
use App\SubCategory;
use Illuminate\Http\Request;

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
