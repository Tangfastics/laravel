<?php

namespace Tangfastics\Repositories\Eloquent;

use Illuminate\Support\Str;
use Tangfastics\Models\User;
use Tangfastics\Models\Article;
use Tangfastics\Services\Forms\ArticleForm;
use Illuminate\Database\Eloquent\Collection;
use Tangfastics\Repositories\ArticleRepositoryInterface;

class ArticleRepository extends AbstractRepository implements ArticleRepositoryInterface
{
	public function __construct(Article $article)
	{
		$this->model = $article;
	}

	public function findAllPaginated($perPage=10)
	{
		return $this->model->latest()->paginate($perPage);
	}

	public function findBySlug($slug)
	{
		return $this->model->whereSlug($slug)->first();
	}

	public function findNextArticle(Article $article)
	{
		return $this->model->where('created_at', '>=', $article->created_at)
			->where('id', '<>', $article->id)
			->orderBy('created_at', 'ASC')
			->first(['id', 'title', 'slug']);
	}

	public function findPreviousArticle(Article $article)
	{
		return $this->model->where('created_at', '<=', $article->created_at)
			->where('id', '<>', $article->id)
			->orderBy('created_at', 'DESC')
			->first(['id', 'title', 'slug']);
	}

	public function create(array $data)
	{
		$article = $this->getNew();

		$article->user_id = $data['user_id'];
		$article->title = e($data['title']);
		$article->snippet = e($data['snippet']);
		$article->post = e($data['post']);

		$article->save();

		return $article;
	}

	public function getCreateForm()
	{
		return new ArticleForm;
	}
}