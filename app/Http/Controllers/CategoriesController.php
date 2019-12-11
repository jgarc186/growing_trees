<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Directing the user to the create page for categories
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Storing the new category into the db and redirecting back to the main page
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validatedData = request()->validate([
            'title' => 'required|max:255',
            'headline' => 'required|max:255',
            'description' => 'required'
        ]);

        Category::create($validatedData);

        return redirect('/')->with('success', "Hooray, you just created a NEW Category!");
    }

    /**
     * Get all the subcategories with their related artciles.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @param int $id
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $category = Category::find($id);

        return view('category.edit', compact([
            'category'
        ]));
    }

    /**
     * Updating the subcategory method
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(int $id)
    {
        $validatedData = request()->validate([
            'title' => 'required|max:255',
            'headline' => 'required|max:255',
            'description' => 'required'
        ]);

        Category::find($id)->update($validatedData);

        return redirect('/')->with('success', "Hooray, you just updated {$validatedData['headline']} Category!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Category::find($id)->delete();

        return redirect('/')->with('success', "Hooray, you just deleted a Category!");
    }
}

