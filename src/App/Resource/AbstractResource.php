<?php

namespace Album\Resource;

use Doctrine\ORM\EntityManager;

abstract class AbstractResource
{

    /**
     *
     * @var Doctrine\ORM\EntityManager 
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    

}
