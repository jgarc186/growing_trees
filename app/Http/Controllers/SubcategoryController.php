<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Get all the categories from db to pass to the view for the select form
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Category $category)
    {
        $categories = $category->getAll();

        return view('subcategory.create', compact('categories'));
    }

    /**
     * Storing the new sub-category into the db and returning the user back to the main page with a success message.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SubCategory $subCategory)
    {
        $validatedData = request()->validate([
            'title' => 'required|unique:categories|max:255',
            'category_id' => 'required',
            'headline' => 'required|unique:categories|max:255',
            'description' => 'required'
        ]);

        $subCategory->save($validatedData);

        return redirect('/')->with('success', "Hooray, you just {$validatedData['headline']} a NEW Sub-Category!");
    }

    /**
     * @param int $id
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id, Category $category)
    {
        $subcategory = SubCategory::find($id);
        $selectedCategory = $category::find($subcategory[0]->category_id);
        $categories = $category->getAll();

        return view('subcategory.edit', compact([
            'categories',
            'subcategory',
            'selectedCategory'
        ]));
    }

    public function update(SubCategory $subCategory)
    {
        $validatedData = request()->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'headline' => 'required|max:255',
            'description' => 'required'
        ]);

        $subCategory->update($validatedData);

        return redirect('/')->with('success', "Hooray, you just updated {$validatedData['headline']} Sub-Category!");
    }
}
