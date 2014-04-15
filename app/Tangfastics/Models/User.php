<?php

namespace Tangfastics\Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Model implements UserInterface, RemindableInterface
{
	
	public $presenter = 'Tangfastics\Presenters\UserPresenter';

	protected $table = 'users';

	protected $hidden = [ 'password' ];

	protected $softDeletes = true;

	protected $attributes = [
		'is_admin' => false
	];

	public function articles()
	{
		return $this->hasMany('Tangfastics\Article');
	}

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getReminderEmail()
	{
		return $this->email;
	}

	public function isAdmin()
	{
		return ($this->is_admin == true);
	}
}