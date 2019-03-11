<?php

namespace App\Controller\admin;

use App\Entity\Article;
use App\Event\ArticleCreationEvent;
use App\Form\ArticleType;
use App\Manager\ArticleManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ArticleController
 * @package App\Controller\admin
 *
 *
 */
class ArticleController extends AbstractController
{
    private $articleManager;

    /**
     * ArticleController constructor.
     * @param ArticleManager $articleManager
     */
    public function __construct(ArticleManager $articleManager)
    {
        $this->articleManager = $articleManager;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $articles = $this->articleManager->findAll();

        return $this->render('admin/article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function new(Request $request, EventDispatcherInterface $eventDispatcher)
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $article->setUser($this->getUser());
            $this->articleManager->update($article);

            // Event
            $eventDispatcher->dispatch(ArticleCreationEvent::EVENT_NAME, new ArticleCreationEvent($article));

            return $this->redirectToRoute("dashboard_article_index");
        }

        return $this->render('admin/article/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return RedirectResponse|Response
     */
    public function edit(Request $request, Article $article)
    {
        $form = $this->createForm(ArticleType::class, $article, [
            'method' => 'PUT'
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->articleManager->update($article);

            return $this->redirectToRoute("dashboard_article_index");
        }

        return $this->render('admin/article/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return Response
     */
    public function show(Request $request, Article $article)
    {
        return $this->render("admin/article/show.html.twig", [
            'article' => $article
        ]);
    }

    public function delete(Request $request, Article $article)
    {
        $this->articleManager->delete($article);

        return $this->redirectToRoute('dashboard_article_index');
    }
}
