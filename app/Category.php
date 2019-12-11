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
}
