<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\LoginType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{

    public function login(Request $request)
    {   
        $user = new Users();
        $form = $this->createForm(LoginType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
         
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Amine SAOUDI',
            "user" => [
                "nom" => "SAOUDI",
                "prenom" => "Amine",
                "avatar" => "https://i1.wp.com/geekirc.me/wp-content/uploads/2017/06/SpongeBob-Miguel-Vasquez-5.jpg",
                "image" => "assets/static/images/500.png",
            ]
        ]);
        }
            $task = $form->getData();
        return $this->render("static/signin.html.twig", array(
            "formulaire" => $form->createView(),
        ));
          
    }
    
    public function postregister(Request $request)
    {
        if (!filter_var($request->get("email"), FILTER_VALIDATE_EMAIL)) 
        {
            return $this->returnJson(array("path" => "/register", "Syntaxe email invalid"), 401);
        }
        $er = $this->getDoctrine()->getRepository(Users::class);
        $userOne = $er->findOneBy(["email" => $request->get("email")]);

        if (!$userOne) {
            
            $em = $this->getDoctrine()->getManager();

            $user = new Users();
            $user->setName($request->get("firstname")." " . $request->get("lastname"));
            $user->setEmail($request->get("email"));
            $user->setPassword($this->encryptPassword($request->get("password")));
            $user->setPhone($request->get("tel"));
            $user->setUpdated();



            try 
            {
                $em->persist($user);
                $em->flush();
            }
            catch(\Doctrine\ORM\EntityNotFoundException $e)
            {
                return $this->returnJson(array("path" => "/register", "Error : Invalid request"), 501);
            }

            if (true) {
                // $data = array("path" => "/home", "Good", $request->get("name")); 
                return $this->returnJson(array("path" => "/home", "User created"), 201);
            }else {
                return $this->returnJson(array("path" => "/register", "User not created"), 401);
            }
        }else {
            return $this->returnJson(array("path" => "/register", "User existed"), 401);
        }
    }
    private function encryptPassword(string $password):string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    private function returnJson($data, $statuscode)
    {
        return new Response ( json_encode($data) , $statuscode, array("Content-Type" => "application/json") );
    }


}