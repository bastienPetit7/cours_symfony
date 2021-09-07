<?php

namespace App\Controller\Journal;

use App\Entity\Journal;
use App\Form\JournalType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateJournalController extends AbstractController
{

    /**
     * @Route("/journal/creer", name="creer_journal")
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        $journal = new Journal(); 

        $form = $this->createForm(JournalType::class, $journal); 

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($journal);
            $em->flush(); 

            $this->addFlash("success", "Le journal : ". $journal->getNom() ."a bien été créé"); 

            return $this->redirectToRoute("creer_journal"); 

        }

        return $this->render("journal/create.html.twig", [
            "formJournal" => $form->createView()
        ]);


    }
}