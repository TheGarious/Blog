<?php

namespace App\Controller\admin;

use App\Manager\ArticleManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleController
 * @package App\Controller\admin
 *
 * @Route("/admin")
 *
 */
class ArticleController extends AbstractController
{

    private $articleManager;

    public function __construct(ArticleManager $articleManager)
    {
        $this->articleManager = $articleManager;
    }

    /**
     * @Route("/article", name="article")
     */
    public function index()
    {
        $articles = $this->articleManager->findAll();

        return $this->render('admin/article/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
