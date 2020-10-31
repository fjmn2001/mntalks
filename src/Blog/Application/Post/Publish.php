<?php

declare(strict_types=1);

namespace MNTalks\Blog\Application\Post;

final class Publish
{
    private $userRepository;
    private $postRepository;

    public function __construct($userRepository, $postRepository)
    {
        $this->userRepository = $userRepository;
        $this->postRepository = $postRepository;
    }

    public function handle(PublishCommand $command)
    {
        $user = $this->userRepository->findOrFail($command->userId());
        $post = $this->postRepository->findOrFail($command->postId());

        $user->publish($post);

        return $post;
    }
}

// se invoca de la siguiente manera desde el controller
$as = new Publish('uR', 'pR');
$as->handle(new PublishCommand(1, 1));

// se invoca de la siguiente manera desde el controller when has been decorating
$as = new LoggerDecorator(new Publish('uR', 'pR'), '');
$as->__invoke(new PublishCommand(1, 1));

// se invoca de la siguiente manera desde el controller when has been decorating
$as = new TransactionalDecorator(new Publish('uR', 'pR'), '');
$as->__invoke(new PublishCommand(1, 1));

