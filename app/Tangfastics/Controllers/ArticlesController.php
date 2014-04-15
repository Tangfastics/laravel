<?php

namespace Tangfastics\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Tangfastics\Repositories\ArticleRepositoryInterface;

class ArticlesController extends BaseController
{
	protected $article;

	public function __construct(ArticleRepositoryInterface $article)
	{
		$this->article = $article;

		parent::__construct();
	}

	public function index()
	{
		$articles = $this->article->findAllPaginated(12);

		$this->view('articles.index', compact('articles'));
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