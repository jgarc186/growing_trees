<?php

namespace App\Http\Controllers;

use App\category;

class EntryController extends Controller
{
    /**
     * Get all the categories and show then in the home page
     *
     * @param category $caterogy
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(category $caterogy)
    {
        $categories = $caterogy->getAll();

        return view('index', compact('categories'));
    }
}
