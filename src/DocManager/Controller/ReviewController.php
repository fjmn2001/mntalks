<?php


namespace MNTalks\DocManager\Controller;

class BaseController
{
}

class CommandBus
{
    private $handlers;

    public function __construct()
    {
        $this->handlers = [];
    }

    public function addHandler(string $commandName, $handler)
    {
        $this->handlers[$commandName] = $handler;
    }

    public function handle($command)
    {
        $commandHandler = $this->handlers[get_class($command)];
        if ($commandHandler === null) {
            throw new \InvalidArgumentException();
        }

        return $commandHandler->handle($command);
    }
}

class ReviewController extends BaseController
{
    public function update($review_id, array $data = [])
    {
        $review = $this->get($review_id);
        $date = new \DateTime();
        $dateFormat = $date->format('Y-m-d H:i:s');

        if ($review->getState() == ReviewStates::IN_PROGRESS) {
            $data['extra'] = serialize(json_decode($data['extra']));
            //...
        }
    }
}