<?php

namespace Tangfastics\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';

	public static $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
        'include_trashed' => true,
        'on_update'       => true,
    ];

	public function articles()
	{
		return $this->belongsToMany('Tangfastics\Models\Article');
	}
}