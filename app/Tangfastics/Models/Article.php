<?php

namespace Tangfastics\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    public $presenter = 'Tangfastics\Presenters\ArticlePresenter';

    protected $with = ['user', 'tags'];

    protected $softDeletes = true;

    public static $sluggable = [
        'build_from' => 'title',
        'save_to' => 'slug',
        'include_trashed' => true,
        'on_update'       => true,
    ];

    public function user()
    {
        return $this->belongsTo('Tangfastics\Models\User');
    }

    public function tags()
    {
        return $this->belongsToMany('Tangfastics\Models\Tag');
    }
}