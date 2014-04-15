<?php

namespace Tangfastics\Controllers;

use Illuminate\Support\Facades\Redirect;
use Tangfastics\Repositories\ArticleRepositoryInterface;

class ArticlesController extends BaseController
{
	protected $articles;

	public function __construct(ArticleRepositoryInterface $articles)
	{
		$this->articles = $articles;

		parent::__construct();
	}

	public function index()
	{
		$articles = $this->articles->findAllPaginated(12);

		$this->view('articles.index', compact('articles'));
	}

	public function show($slug)
	{
		if (is_null($slug)) return Redirect::route('articles.index')->withError('No article slug was found.');

		$article = $this->articles->findBySlug($slug);

		if (is_null($article)) return Redirect::route('articles.index')->withError('There was no article found using that slug.');

		$nextArticle = $this->articles->findNextArticle($article);
		$prevArticle = $this->articles->findPreviousArticle($article);

		$this->view('articles.show', compact('article', 'nextArticle', 'prevArticle'));
	}
}