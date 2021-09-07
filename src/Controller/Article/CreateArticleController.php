<?php


namespace App\Controller\Article;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CreateArticleController extends AbstractController
{

    /**
     * @Route("/article/creer", name="creer_article")
     */

    public function create(Request $request)
    {
        $article = new Article(); 

        $form = $this->createForm(ArticleType::class, $article);  

        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {
            dd($request);
            
        }

        return $this->render('article/create.html.twig', [
            "formArticle" => $form->createView()
        ]);
    }
}