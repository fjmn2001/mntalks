<?php

declare(strict_types=1);

namespace MNTalks\Blog\Domain;

use MNTalks\Blog\Application\Post\PostWasPublished;
use MNTalks\Shared\Domain\DomainEventPublisher;
use MNTalks\Shared\Domain\User;

final class Post
{
    public function publish(User $user)
    {
        DomainEventPublisher::instance()->publish(
            new PostWasPublished($user->id(), '')
        );

    }
}