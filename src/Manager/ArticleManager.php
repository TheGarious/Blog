<?php

namespace App\Manager;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;

class ArticleManager extends AbstractManager
{
    public function __construct(EntityManagerInterface $em, ArticleRepository $articleRepository)
    {
        $this->setManager($em);
        $this->setRepository($articleRepository);
    }

    /**
     * @param Article $entity
     * @return mixed
     */
    public function update($entity)
    {
        if (is_object($entity)) {
            $em = $this->getManager();
            $entity->setUrl(str_replace(" ", "-", $entity->getTitle()));

            $em->persist($entity);
            $em->flush();
        }
        return $entity;
    }
}
