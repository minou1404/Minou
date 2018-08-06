<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{

    public function login()
    {   
        return new Response("Coucou");
    }
    
    public function postregister(Request $request)
    {
        $data = $request->query->get("name");
        return new Response ( json_encode($data));
    }


}