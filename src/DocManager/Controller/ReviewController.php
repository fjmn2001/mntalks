<?php


namespace MNTalks\DocManager\Controller;

class BaseController {}

class ReviewController extends BaseController
{
    public function update($review_id, array $data = [])
    {
        $review = $this->get($review_id);
        $date = new \DateTime();
        $dateFormat = $date->format('Y-m-d H:i:s');

        if($review->getState() == ReviewStates::IN_PROGRESS){
            $data['extra'] = serialize(json_decode($data['extra']));
            //...
        }
    }
}