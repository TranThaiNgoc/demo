<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->postRepository->create($request->all());
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = $this->postRepository->getById($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = $this->postRepository->getById($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->postRepository->update($id, $request->all());
        return redirect()->route('posts.show', $id);
    }

    public function destroy($id)
    {
        $this->postRepository->delete($id);
        return redirect()->route('posts.index');
    }
}

