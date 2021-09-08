<?php

namespace App\Controller\Article;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SupprimerArticleController extends AbstractController
{
    /**
     * @Route("article/supprimer/{id}", name="supprimer_article")
     */
    public function supprimer(int $id, ArticleRepository $articleRepository, EntityManagerInterface $em)
    {

        $article = $articleRepository->find($id); 

        if(!$article)
        {
            $this->addFlash("danger", "article existe pas"); 
            return $this->redirectToRoute("liste-route");
        }

        $em->remove($article);
        $em->flush(); 

        $this->addFlash("success", "l'article a bien été supprimer"); 

        return $this->redirectToRoute("liste_article"); 



    }
}