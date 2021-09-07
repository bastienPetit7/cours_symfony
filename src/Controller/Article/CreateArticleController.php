<?php


namespace App\Controller\Article;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateArticleController extends AbstractController
{

    /**
     * @Route("/article/creer", name="creer_article")
     */

    public function create()
    {
        $article = new Article(); 

        $form = $this->createForm(ArticleType::class, $article);  

        return $this->render('article/create.html.twig', [
            "formArticle" => $form->createView()
        ]);
    }
}