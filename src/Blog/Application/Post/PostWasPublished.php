<?php
declare(strict_types=1);

namespace MNTalks\Blog\Application\Post;

use MNTalks\Shared\Domain\DomainEvent;

final class PostWasPublished implements DomainEvent
{
    private $authorId;
    private $postId;
    private $ocurredOn;

    public function __construct($authorId, $postId)
    {
        $this->authorId = $authorId;
        $this->postId = $postId;
        $this->ocurredOn = (new \DateTimeImmutable)->getTimestamp();
    }

    public function ocurredOn()
    {
        return $this->ocurredOn;
    }

    public function authorId()
    {
        return $this->authorId;
    }

    public function postId()
    {
        return $this->postId;
    }
}