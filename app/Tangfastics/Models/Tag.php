<?php

namespace Tangfastics\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = "tags";

	public function articles()
	{
		return $this->belongsToMany('Tangfastics\Models\Article');
	}
}