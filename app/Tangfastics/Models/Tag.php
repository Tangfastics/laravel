<?php

namespace Tangfastics\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = "tags";

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