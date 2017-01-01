<?php

namespace CyberdenBundle\Service\ModelRepository;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CyberdenBundle\Model\StationQuery;

class StationRepository
{
    private $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function save()
    {

    }

    public function delete()
    {

    }

    public function createQuery()
    {
        return StationQuery::create();
    }
}
