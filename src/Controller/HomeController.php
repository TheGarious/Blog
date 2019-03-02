<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ArticleManager $articleManager)
    {
        $articles = $articleManager->findAll();

        return $this->render('home/index.html.twig', [
            'articles'          => $articles,
            'controller_name'   => 'HomeController',
        ]);
    }
}
