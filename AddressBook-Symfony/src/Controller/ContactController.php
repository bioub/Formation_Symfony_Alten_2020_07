<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contacts")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function list()
    {
        return $this->render('contact/list.html.twig', [

        ]);
    }

    /**
     * @Route("/create/")
     */
    public function create()
    {
        return $this->render('contact/create.html.twig', [

        ]);
    }

    /**
     * @Route("/{contactId}/", requirements={"contactId": "[1-9][0-9]*"})
     */
    public function show($contactId)
    {
        return $this->render('contact/show.html.twig', [
            'id' => $contactId
        ]);
    }

    /**
     * @Route("/{contactId}/update/", requirements={"contactId": "[1-9][0-9]*"})
     */
    public function update($contactId)
    {
        return $this->render('contact/update.html.twig', [

        ]);
    }

    /**
     * @Route("/{contactId}/delete/", requirements={"contactId": "[1-9][0-9]*"})
     */
    public function delete($contactId)
    {
        return $this->render('contact/delete.html.twig', [

        ]);
    }
}
