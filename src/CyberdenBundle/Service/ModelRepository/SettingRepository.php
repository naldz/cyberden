<?php

namespace CyberdenBundle\Service\ModelRepository;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CyberdenBundle\Model\SettingQuery;

class SettingRepository
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
        return SettingQuery::create();
    }
}
