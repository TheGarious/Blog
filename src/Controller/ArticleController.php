<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{

    public function show($url, ArticleManager $articleManager)
    {
        $article = $articleManager->findBy(['url' => $url]);
        if (!$article) {
            throw new \Exception("Article not found");
        }

        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }

    public function list(ArticleManager $articleManager)
    {
        $articles = $articleManager->findAll();
        return $this->render('article/list.html.twig', [
            'articles' => $articles
        ]);
    }
}
