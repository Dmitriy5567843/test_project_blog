<?php

namespace App\Http\Controllers\Post;

use App\DTO\CreatePostDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Services\PostService;
use App\Models\Category;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        $list = Category::all();
        $posts = Post::with(['user', 'category'])->get();

        return view('posts.index', compact('posts', 'list'));
    }

    public function view(int $id)
    {
        $post = Post::with(['user', 'category'])->where('id', $id)->first();

        return view('posts.view', compact('post'));
    }

    public function create(CreateRequest $request, PostService $postService,)
    {
        $postService->create(
            new CreatePostDTO(
                $request->get('category_id'),
                $request->get('title'),
                $request->get('content')
            ));

        return redirect()->route('posts.index');
    }
    public function edit(int $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }
    public function update(int $id, UpdateRequest $request)
    {
        Post::findOrFail($id)
            ->update([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
            ]);
        return redirect()->route('posts.index');
    }

    public function delete(int $id)
    {
        Post::where('id', $id)->delete();

        return redirect()->route('posts.index');
    }
}
