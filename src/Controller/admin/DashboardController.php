<?php

namespace App\Controller\admin;

use App\Manager\ArticleManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ArticleController
 * @package App\Controller\admin
 *
 */
class DashboardController extends AbstractController
{
    private $articleManager;

    public function __construct(ArticleManager $articleManager)
    {
        $this->articleManager = $articleManager;
    }

    public function index()
    {
        $articles = $this->articleManager->findAll();

        return $this->render('admin/article/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
