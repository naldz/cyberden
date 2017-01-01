<?php

namespace CyberdenBundle\Service\ModelRepository;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CyberdenBundle\Model\SessionQuery;
use CyberdenBundle\Model\Session;

class SessionRepository
{
    private $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function save(Session $session)
    {
        $session->save();
    }

    public function createQuery()
    {
        return SessionQuery::create();
    }
}
