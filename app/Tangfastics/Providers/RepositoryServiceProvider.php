<?php

namespace Tangfastics\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind(
			'Tangfastics\Repositories\ArticleRepositoryInterface',
			'Tangfastics\Repositories\Eloquent\ArticleRepository'
		);

		$this->app->bind(
			'Tangfastics\Repositories\CategoryRepositoryInterface',
			'Tangfastics\Repositories\Eloquent\CategoryRepository'
		);

		$this->app->bind(
			'Tangfastics\Repositories\TagRepositoryInterface',
			'Tangfastics\Repositories\Eloquent\TagRepository'
		);
	}
}