<?php


namespace App\Controller\Article;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CreateArticleController extends AbstractController
{

    /**
     * @Route("/admin/article/creer", name="creer_article")
     * 
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        $article = new Article(); 

        $form = $this->createForm(ArticleType::class, $article);  

        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {
            $auteur = $this->getUser();

            $article->setAuteur($auteur);  

            $em->persist($article);

            $em->flush();

            $this->addFlash('success',"l'article : " .$article->getTitre(). " , a bien été créé.");

            return $this->redirectToRoute('creer_article');
            
        }

        return $this->render('article/create.html.twig', [
            "formArticle" => $form->createView()
        ]);
    }
}