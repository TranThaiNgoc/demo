<?php

namespace App\Repositories;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function delete($id);
}
