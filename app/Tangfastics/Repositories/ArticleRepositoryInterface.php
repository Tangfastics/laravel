<?php

namespace Tangfastics\Repositories;

use Tangfastics\Models\User;
use Tangfastics\Models\Article;

interface ArticleRepositoryInterface
{
	public function findAllPaginated($perPage=10);

	public function findBySlug($slug);

	public function findNextArticle(Article $article);

	public function findPreviousArticle(Article $article);
}