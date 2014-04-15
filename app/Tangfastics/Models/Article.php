<?php

namespace Tangfastics\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $table = 'articles';

	public $presenter = 'Tangfastics\Presenters\ArticlePresenter';

	protected $with = [];
}