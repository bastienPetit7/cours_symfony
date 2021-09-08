<?php

namespace App\Controller\Article;

use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShowArticleController extends AbstractController
{

    /**
     * @Route("article/show/{id}", name="show_one_article")
     */
    public function show(int $id, ArticleRepository $articleRepository)
    {

        $article = $articleRepository->find($id); 

        return $this->render('article/show.html.twig', [
            "article" => $article
        ]);

    }
}