<?php

namespace Tangfastics\Services\Forms;

class ArticleForm extends AbstractForm
{
	protected $rules = [
		'title'		=> 'required|min:4|max:250',
		'snippet'	=> 'required',
		'post'		=> 'required',
	];

	public function getInputData()
	{
		return array_only($this->inputData, [
			'title', 'snippet', 'post', 'tags', 'categories'
		]);
	}
}