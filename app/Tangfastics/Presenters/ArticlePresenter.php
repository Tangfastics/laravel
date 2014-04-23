<?php

namespace Tangfastics\Presenters;

use Tangfastics\Models\Tag;
use Tangfastics\Models\User;
use Tangfastics\Models\Article;
use Tangfastics\Models\Category;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\HTML;
use McCool\LaravelAutoPresenter\BasePresenter;

class ArticlePresenter extends BasePresenter
{
	public function __construct(Article $article)
	{
		$this->resource = $article;
	}

	public function allCategories()
	{
		return $this->resource->categories;
	}

	public function categories()
	{
		$result = '';

		if ($this->hasCategories())
		{
			$categories = [];

			foreach ($this->resource->categories as $category)
			{
				$categories[] = $this->getCategoryLink($category);
			}

			$result = implode(', ', $categories);
		}

		return $result;
	}

	public function hasCategories()
	{
		return isset($this->resource->categories) && count($this->resource->categories) > 0;
	}

	public function getCategoryLink(Category $category)
	{
		return \View::make('articles.partials.categoryLink', compact('category'));
	}

	//Tags
	public function allTags()
	{
		return $this->resource->tags;
	}

	public function tags()
	{
		$result = '';

		if ($this->hasTags())
		{
			$tags = [];

			foreach ($this->resource->tags as $tag)
			{
				$tags[] = $this->getTagLink($tag);
			}

			$result = implode(', ', $tags);
		}

		return $result;
	}

	public function hasTags()
	{
		return isset($this->resource->tags) && count($this->resource->tags) > 0;
	}

	public function getTagLink(Tag $tag)
	{
		return \View::make('articles.partials.tagLink', compact('tag'));
	}
}