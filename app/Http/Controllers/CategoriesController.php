<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Get all the subcategories with their related artciles.
     *
     * @param category $category
     * @param SubCategory $subCaterogy
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Category $category, SubCategory $subCaterogy)
    {
        $contents = [];
        foreach ($subCaterogy->getSubcategories($category->id) as $subcategory) {
            $contents[] = [
                'subcategory' => $subcategory,
                'articles' => $subCaterogy->getArticles($subcategory->id)
            ];
        }

        return view('category.index', compact([
            'category',
            'contents'
        ]));
    }

    /**
     * Directing the user to the create page for categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Storing the new category into the db and redirecting back to the main page
     *
     * @param Request $request
     */
    public function store(Category $category)
    {
        $validatedData = request()->validate([
            'title' => 'required|max:255',
            'headline' => 'required|max:255',
            'description' => 'required'
        ]);

        dd($category->save($validatedData));

        return redirect('/')->with('success', "Hooray, you just created a NEW Category!");
    }

    /**
     * Returning the
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('category.edit');
    }

    public function update()
    {

    }
}
