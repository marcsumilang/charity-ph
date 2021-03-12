<?php namespace App\Repositories\Cms\Contracts;

interface CmsInterface
{
	public function all();

	public function paginate($limit);

	public function create(array $data);

	public function update(array $data, $id);

	public function delete($id);

	public function show($id);
}