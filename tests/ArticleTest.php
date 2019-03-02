<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testSomething()
    {
        $this->assertTrue(true);
    }

    public function testTitle()
    {
        $title = "Title";

        $article = $this->getArticle();
        $article->setTitle($title);

        $this->assertSame($title, $article->getTitle());
    }

    public function testSubTitle()
    {
        $subTitle = "subTitle";

        $article = $this->getArticle();
        $article->setSubTitle($subTitle);

        $this->assertSame($subTitle, $article->getSubTitle());
    }

    public function testUser()
    {
        $user = $this->getUser();

        $article = $this->getArticle();

        $article->setUser($user);

        $this->assertSame($user, $article->getUser());
    }

    public function testKeyword()
    {
        $keyword = "test";

        $article = $this->getArticle();
        $article->setKeyword($keyword);

        $this->assertSame($keyword, $article->getKeyword());
    }

    private function getArticle()
    {
        return new Article();
    }

    private function getUser()
    {
        return new User;
    }
}
