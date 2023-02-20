<?php

namespace App\DTO;

class CreatePostDTO
{
    private int $categoryId;

    private string $title;

    private string $content;

    public function __construct(int $categoryId, string $title, string $content)
    {
        $this->categoryId = $categoryId;
        $this->title = $title;
        $this->content = $content;
    }


    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }


}

