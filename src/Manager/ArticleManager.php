<?php

namespace App\Manager;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;

class ArticleManager extends AbstractManager
{
    public function __construct(EntityManagerInterface $em, ArticleRepository $articleRepository)
    {
        $this->setManager($em);
        $this->setRepository($articleRepository);
    }
}
