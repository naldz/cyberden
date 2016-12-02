<?php

namespace CyberdenBundle\Service\EntityRepository;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CyberdenBundle\Model\AdministratorQuery;

class AdministratorRepository
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
        return AdministratorQuery::create();
    }
}
