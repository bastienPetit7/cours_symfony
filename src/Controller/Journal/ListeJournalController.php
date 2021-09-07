<?php

namespace App\Controller\Journal;

use App\Repository\JournalRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListeJournalController extends AbstractController
{

    /**
     * @Route("journal/liste", name="liste_journal")
     */
    
     public function list(JournalRepository $journalRepository)
     {

            $journaux = $journalRepository->findAll(); 

            return $this->render('journal/liste.html.twig', [
                "journaux" => $journaux
            ]);

     }
}