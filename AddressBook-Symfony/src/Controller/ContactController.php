<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts")
     */
    public function list()
    {
        return $this->render('contact/list.html.twig', [

        ]);
    }

    /**
     * @Route("/contacts/123")
     */
    public function show()
    {
        return $this->render('contact/show.html.twig', [

        ]);
    }

    /**
     * @Route("/contacts/create")
     */
    public function create()
    {
        return $this->render('contact/create.html.twig', [

        ]);
    }

    /**
     * @Route("/contacts/123/update")
     */
    public function update()
    {
        return $this->render('contact/update.html.twig', [

        ]);
    }

    /**
     * @Route("/contacts/123/delete")
     */
    public function delete()
    {
        return $this->render('contact/delete.html.twig', [

        ]);
    }
}
