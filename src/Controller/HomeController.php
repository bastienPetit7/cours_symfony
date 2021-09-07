<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home/{prenom?World}/{age?20}", name="home")
     */
    public function index( string $prenom, int $age): Response
    {
        $txt = "Yo comment vas?"; 

        $pokemons = [
            'pikatchu',
            'Salamech',
            'Trou dbite'
        ];

        $ninja = [
            'village'=> 'Konoha', 
            'renard'=> 'Kyubi'
        ];

        return $this->render('home/index.html.twig', [
            'prenom' => $prenom, 
            "toto" => $txt, 
            "age" => $age,
            "pokemons" => $pokemons, 
            "ninja" => $ninja

        ]);
    }
}
