<?php
declare(strict_types=1);

namespace MNTalks\Blog\Application\Post;

final class TransactionalDecorator
{
    private $commandHandler;
    private $db;

    public function __construct($commandHandler, $db)
    {
        $this->commandHandler = $commandHandler;
        $this->db = $db;
    }

    public function __invoke($command)
    {
        $this->db::transaction(function () use ($command) {
            $this->commandHandler->__invoke($command);
        });
    }
}