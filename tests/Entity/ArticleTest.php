<?php

namespace App\Tests\Entity;

use App\Entity\Article;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testContent()
    {
        $content = "my content";

        $article = $this->getArticle();
        $article->setContent($content);

        $this->assertSame($content, $article->getContent());
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

    public function testUrl()
    {
        $url = "test";

        $article = $this->getArticle();
        $article->setUrl($url);

        $this->assertSame($url, $article->getUrl());
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
