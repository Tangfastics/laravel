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
		$type      = \Lang::get('articles.type_latest');
        $pageTitle = \Lang::get('articles.browsing_latest');

		$this->view('articles.index', compact('articles', 'breadcrumb', 'type', 'pageTitle'));
	}

	public function show($slug)
	{
		if (is_null($slug)) return Redirect::route('articles.index')->withError(Lang::get('articles.error_no_slug'));

		$article = $this->article->findBySlug($slug);

		if (is_null($article)) return Redirect::route('articles.index')->withError(Lang::get('articles.error_no_article'));

		$nextArticle = $this->article->findNextArticle($article);
		$prevArticle = $this->article->findPreviousArticle($article);

		$this->view('articles.show', compact('article', 'nextArticle', 'prevArticle'));
	}

	public function showCategory($category)
	{
		list($category, $articles) = $this->article->findByCategory($category);

		$breadcrumb = Lang::get('articles.viewing_category', ['category' => $category->name]);
		$type = Lang::get('articles.type_category', array('category' => $category->name));
        $pageTitle = Lang::get('articles.browsing_category', array('category' => $category->name));

		$this->view('articles.index', compact('articles', 'breadcrumb', 'type', 'pageTitle'));
	}

	public function showTag($tag)
	{
		list($tag, $articles) = $this->article->findByTag($tag);

		$breadcrumb = Lang::get('articles.viewing_tag', ['tag' => $tag->name]);
		$type = Lang::get('articles.type_tag', array('tag' => $tag->name));
        $pageTitle = Lang::get('articles.browsing_tag', array('tag' => $tag->name));

		$this->view('articles.index', compact('articles', 'breadcrumb', 'type', 'pageTitle'));
	}

	public function create()
	{
		$tags = $this->tags->listAll();
		$categories = $this->categories->listAll();

		return $this->view('articles.create', compact('tags', 'categories'));
	}

	public function store()
	{
		$form = $this->article->getCreateForm();

		if (!$form->isValid()) return Redirect::back()->withErrors($form->getErrors());

		$data = $form->getInputData();

		// $data['user_id'] = Auth::user()->id;
		$data['user_id'] = 1;

		$article = $this->article->create($data);

		return Redirect::route('articles.index')->withMessage(Lang::get('articles.message_post_successful'));
	}

	public function edit($slug)
	{
		$article = $this->article->findBySlug($slug);

		$tags = $this->tags->listAll();
		$categories = $this->categories->listAll();

		$selectedTags = $this->article->listTagsIdsForArticle($article);
		$selectedCategories = $this->article->listCategoriesIdsForArticle($article);

		return $this->view('articles.edit', compact('article', 'tags', 'categories', 'selectedTags', 'selectedCategories'));
	}

	public function update($slug)
	{
		$article = $this->article->findBySlug($slug);
		$form = $this->article->getEditForm($article->id);

		if (!$form->isValid()) return Redirect::back()->withErrors($form->getErrors());

		$data = $form->getInputData();
		$article = $this->article->edit($article, $data);

		return Redirect::route('articles.index')->withMessage(Lang::get('articles.message_update_successful'));
	}
}
