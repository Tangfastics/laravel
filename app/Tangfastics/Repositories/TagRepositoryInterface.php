<?php

namespace Tangfastics\Repositories;

interface TagRepositoryInterface
{
	public function listAll();

	public function findAll($orderColumn='created_at', $orderDirection='desc');

	public function findById($id);

	public function findAllWithArticleCount();

	public function create(array $data);

	public function update($id, array $data);

	public function delete($id);
}