<?php

namespace App\Http\Services;

use App\DTO\CreatePostDTO;
use App\Models\Post;

class PostService
{
    public function create(CreatePostDTO $dto)
    {
        $authUserId = \auth()->user()->id;

        return  Post::create([
            'category_id' => $dto->getCategoryId(),
            'user_id'=>$authUserId,
            'title' => $dto->getTitle(),
            'content' => $dto->getContent(),
        ]);
    }
}
