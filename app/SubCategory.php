<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = [];

    /**
     * Finding the sub-category, based on the id.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function find(int $id)
    {
        return SubCategory::query()
            ->select("*")
            ->where('id', $id)
            ->get();
    }

    /**
     * Get all subcategories related to the category id.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getSubcategories(int $id)
    {
        return SubCategory::query()
            ->select('*')
            ->where('category_id', $id)
            ->orderBy('created_at')
            ->get();
    }

    /**
     * Get all artciles realted to the subcategory id.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getArticles(int $id)
    {
        return Article::query()
            ->select('*')
            ->where('sub_category_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
