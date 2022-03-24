<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController{

    /**
     * @Route("/hello")
    */

    /* C'est une action sans parametres */
    public function hello(){
        return new Response("Hello Word");
    }

    /**
     * @Route("/hello/{name}")
    */
    /* C'est une action avec parametres */
    public function helloName($name): Response{
        return new Response("Hello ".$name);
    }


}