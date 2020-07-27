<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"})
     */
    public function index()
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * @Route("/hello/{name}")
     */
    public function hello($name) {
//        $response = new Response();
//        $response->setStatusCode(200);
//        $response->headers->set('Content-type', 'application/json');
//        $response->setContent(json_encode([
//            "message" => "Hello $name"
//        ]));
//
//        return $response;
       return $this->json([
           "message" => "Hello $name"
       ]);

    }
}
