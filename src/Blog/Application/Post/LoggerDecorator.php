<?php
declare(strict_types=1);

namespace MNTalks\Blog\Application\Post;

final class LoggerDecorator
{
    private $commandHandler;
    private $monolog;

    public function __construct($commandHandler, $monolog)
    {
        $this->commandHandler = $commandHandler;
        $this->monolog = $monolog;
    }

    public function __invoke($command)
    {
        $this->monolog->log(serialize($command));
        $this->commandHandler->__invoke($command);
    }
}