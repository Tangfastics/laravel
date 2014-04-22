<?php

namespace Tangfastics\Repositories\Eloquent;

use Tangfastics\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Tangfastics\Services\Forms\TagForm;
use Tangfastics\Repositories\TagRepositoryInterface;

class TagRepository extends AbstractRepository implements TagRepositoryInterface
{
	public function __construct(Tag $tag)
	{
		$this->model = $tag;
	}

	public function listAll()
	{
		return $this->model->lists('name', 'id');
	}

	public function findAll($orderColumn='created_at', $orderDirection='desc')
	{
		return $this->model->orderBy($orderColumn, $orderDirection)->get();
	}

	public function findById($id)
	{
		return $this->model->find($id);
	}

	public function findAllWithArticleCount()
	{
		return $this->model
			->leftJoin('article_tag', 'tags.id', '=', 'article_tag.tag_id')
			->leftJoin('articles', 'articles.id', '=', 'article_tag.article_id')
			->groupBy('tags.slug')
			->orderBy('article_count', 'desc')
			->get([
				'tags.name',
				'tags.slug',
				DB::raw('COUNT(articles.id) as article_count')
			]);
	}

	public function create(array $data)
	{
		//code
	}

	public function update($id, array $data)
	{
		//code
	}

	public function delete($id)
	{
		//code
	}

	public function getForm()
	{
		return new TagForm;
	}
}