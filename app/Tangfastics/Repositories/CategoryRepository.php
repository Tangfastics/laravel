<?php

namespace Tangfastics\Repositories\Eloquent;

use Tangfastics\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Tangfastics\Services\Forms\CategoryForm;
use Tangfastics\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function listAll()
    {
        return $this->model->lists('name', 'id');
    }

    public function findAll($orderColumn='created_at', $orderDirection='desc')
    {
        return $this->model->orderBy($orderColumn, $orderDirection)->get();
    }

    public function findAllWithArticleCount()
    {
        return $this->model->leftJoin('article_category', 'categories.id', '=', 'article_category.category_id')
            ->leftJoin('article', 'articles.id', '=', 'article_category.article_id')
            ->groupBy('categories.slug')
            ->orderBy('article_count', 'desc')
            ->get([
                'categories.name',
                'categories.slug',
                DB::raw('COUNT(articles.id) as article_count')
            ]);
    }

    public function findById($id)
    {
        return $this->model->find($id);
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
        return new CategoryForm;
    }
}