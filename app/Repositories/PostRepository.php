<?php

namespace App\Repositories;

use App\Post;

class PostRepository implements PostRepositoryInterface
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAll()
    {
        return $this->post->all();
    }

    public function getById($id)
    {
        return $this->post->findOrFail($id);
    }

    public function create(array $attributes)
    {
        $validatedData = validator($attributes, [
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required',
        ])->validate();

        return $this->post->create($attributes);
    }

    public function update($id, array $attributes)
    {
        try {
            $post = Post::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            throw new ModelNotFoundException("Post with ID {$id} not found.");
        }

        $validatedData = validator($attributes, [
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required',
        ])->validate();

        $post->update($attributes);
        return $post;
    }

    public function delete($id)
    {
        try {
            $post = Post::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            throw new ModelNotFoundException("Post with ID {$id} not found.");
        }

        $post = $this->getById($id);
        $post->delete();
    }
}
