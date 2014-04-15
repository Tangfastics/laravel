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
	}
}