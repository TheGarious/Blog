<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index(ArticleManager $articleManager)
    {
        $articles = $articleManager->findAll();

        return $this->render('home/index.html.twig', [
            'articles'          => $articles,
            'controller_name'   => 'HomeController',
        ]);
    }
}
