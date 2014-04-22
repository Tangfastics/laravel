<?php

namespace Tangfastics\Repositories;

interface CategoryRepositoryInterface
{
	public function listAll();

	public function findAll($orderColumn='created_at', $orderDirection='desc');

	public function findAllWithArticleCount();

	public function findById($id);

	public function create(array $data);

	public function update($id, array $data);

	public function delete($id);

	public function getForm();
}