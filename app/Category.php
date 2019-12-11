<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    /**
     * Get all existing categories in the db.
     *
     * @return category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->all();
    }

    /**
     * Get the the cateroy row, based on the $id provided.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function find(int $id)
    {
        return Category::query()
            ->select('*')
            ->where('id', $id)
            ->get();
    }
}
