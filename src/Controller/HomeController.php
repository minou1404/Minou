<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Amine SAOUDI',
            "user" => [
                "nom" => "SAOUDI",
                "prenom" => "Amine",
                "avatar" => "https://i1.wp.com/geekirc.me/wp-content/uploads/2017/06/SpongeBob-Miguel-Vasquez-5.jpg",
                "image" => "assets/static/images/500.png",
            ]
        ]);
       // return $this->redirectToRoute("login"); 
        
    }
}
