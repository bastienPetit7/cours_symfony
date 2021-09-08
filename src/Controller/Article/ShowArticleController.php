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

        if (!$article)
        {
            $this->addFlash("danger", "l'article n'existe pas" );
            return $this->redirectToRoute("liste_article");
        }

        return $this->render('article/show.html.twig', [
            "article" => $article
        ]);

    }
}