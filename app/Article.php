<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['post'];
}
