<?php

namespace Tangfastics\Presenters;

use Tangfastics\Models\User;
use McCool\LaravelAutoPresenter\BasePresenter;

class UserPresenter extends BasePresenter
{
	public function __construct(User $user)
	{
		$this->resource = $user;
	}
}