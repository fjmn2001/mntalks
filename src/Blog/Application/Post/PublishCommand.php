<?php
declare(strict_types=1);

namespace MNTalks\Blog\Application\Post;

final class PublishCommand
{
    private $userId;
    private $postId;

    public function __construct($userId, $postId)
    {
        $this->userId = $userId;
        $this->postId = $postId;
    }

    public function userId()
    {
        return $this->userId;
    }

    public function postId()
    {
        return $this->postId;
    }
}