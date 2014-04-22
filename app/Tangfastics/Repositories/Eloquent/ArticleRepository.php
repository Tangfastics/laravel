<?php

namespace Tangfastics\Repositories\Eloquent;

use Illuminate\Support\Str;
use Tangfastics\Models\User;
use Tangfastics\Models\Tag;
use Tangfastics\Models\Category;
use Tangfastics\Models\Article;
use Tangfastics\Services\Forms\ArticleForm;
use Illuminate\Database\Eloquent\Collection;
use Tangfastics\Repositories\ArticleRepositoryInterface;
use Tangfastics\Repositories\TagRepositoryInterface;
use Tangfastics\Repositories\CategoryRepositoryInterface;

class ArticleRepository extends AbstractRepository implements ArticleRepositoryInterface
{
    protected $category;

    protected $tags;

    public function __construct(Article $article, Category $category, Tag $tag)
    {
        $this->model = $article;
        $this->category = $category;
        $this->tag = $tag;
    }

    public function findAllPaginated($perPage=10)
    {
        return $this->model->latest()->paginate($perPage);
    }

    public function findBySlug($slug)
    {
        return $this->model->whereSlug($slug)->first();
    }

    public function findByCategory($slug, $perPage=10)
    {
        $category = $this->category->whereSlug($slug)->first();

        if (is_null($category)) {
            throw new \Exception('The category "'.$slug.'" does not exist!');
        }

        $articles = $category->articles()->orderBy('created_at', 'DESC')->paginate($perPage);

        return [$category, $articles];
    }

    public function findByTag($slug, $perPage=10)
    {
        $tag = $this->tag->whereSlug($slug)->first();

        if (is_null($tag)) throw new \Exception('The tag "'.$slug.'" does not exist!');
        
        $articles = $tag->articles()->orderBy('created_at', 'desc')->paginate($perPage);

        return [$tag, $articles];
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
        $article->title = $data['title'];
        $article->snippet = $data['snippet'];
        $article->post = $data['post'];

        $article->save();

        return $article;
    }

    public function getCreateForm()
    {
        return new ArticleForm;
    }
}