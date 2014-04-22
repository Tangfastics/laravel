<?php

namespace Tangfastics\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Tangfastics\Repositories\TagRepositoryInterface;
use Tangfastics\Repositories\ArticleRepositoryInterface;
use Tangfastics\Repositories\CategoryRepositoryInterface;

class ArticlesController extends BaseController
{
	protected $article;

	protected $categories;

	protected $tags;

	public function __construct(ArticleRepositoryInterface $article, CategoryRepositoryInterface $categories, TagRepositoryInterface $tags)
	{
		$this->article = $article;
		$this->categories = $categories;
		$this->tags = $tags;

		parent::__construct();
	}

	public function index()
	{
		$articles = $this->article->findAllPaginated();

		$breadcrumb = Lang::get('articles.latest_articles');

		$this->view('articles.index', compact('articles', 'breadcrumb'));
	}

	public function show($slug)
	{
		if (is_null($slug)) return Redirect::route('articles.index')->withError('No article slug was found.');

		$article = $this->article->findBySlug($slug);

		if (is_null($article)) return Redirect::route('articles.index')->withError('There was no article found using that slug.');

		$nextArticle = $this->article->findNextArticle($article);
		$prevArticle = $this->article->findPreviousArticle($article);

		$this->view('articles.show', compact('article', 'nextArticle', 'prevArticle'));
	}

	public function showCategory($category)
	{
		list($category, $articles) = $this->article->findByCategory($category);

		$breadcrumb = Lang::get('articles.viewing_category', ['category' => $category->name]);

		$this->view('articles.index', compact('articles', 'breadcrumb'));
	}

	public function showTag($tag)
	{
		list($tag, $articles) = $this->article->findByTag($tag);

		$breadcrumb = Lang::get('articles.viewing_tag', ['tag' => $tag->name]);

		$this->view('articles.index', compact('articles', 'breadcrumb'));
	}

	public function create()
	{
		return $this->view('articles.create');
	}

	public function store()
	{
		$form = $this->article->getCreateForm();

		if (!$form->isValid()) return Redirect::back()->withErrors($form->getErrors());

		$data = $form->getInputData();

		// $data['user_id'] = Auth::user()->id;
		$data['user_id'] = 1;

		$article = $this->article->create($data);

		return Redirect::route('articles.index')->withMessage('The new article has been added successfully.');
	}
}