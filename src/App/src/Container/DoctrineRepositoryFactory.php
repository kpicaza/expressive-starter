<?php

declare(strict_types=1);

namespace App\Container;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

class DoctrineRepositoryFactory
{
    public function __invoke(ContainerInterface $container, string $repositoryName): ObjectRepository
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get(EntityManager::class);

        return  $entityManager->getRepository($repositoryName);
    }
}
