<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
        $repo = $this->getDoctrine()->getRepository(Contact::class); // lire des entités

        // $contacts = $repo->findAll(); // SELECT cols FROM contact;

        $contacts = $repo->findBy([], null, 100); // SELECT cols FROM contact LIMIT 100;

        return $this->render('contact/list.html.twig', [
            'contacts' => $contacts
        ]);
    }

    /**
     * @Route("/create/")
     */
    public function create(Request $request)
    {
        $contactForm = $this->createForm(ContactType::class);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $contact = $contactForm->getData(); // Contact

            $manager->persist($contact);
            $manager->flush();

            return $this->redirectToRoute('app_contact_list');
        }

        return $this->render('contact/create.html.twig', [
            'contactForm' => $contactForm->createView(),
        ]);
    }

    /**
     * @Route("/{contactId}/", requirements={"contactId": "[1-9][0-9]*"})
     */
    public function show($contactId)
    {
        $repo = $this->getDoctrine()->getRepository(Contact::class); // lire des entités
        $contact = $repo->find($contactId); // SELECT cols FROM contact WHERE id = :contactId

        if (!$contact) {
            throw $this->createNotFoundException("Contact $contactId not found");
        }

        return $this->render('contact/show.html.twig', [
            'id' => $contactId,
            'contact' => $contact,
        ]);
    }

    /**
     * @Route("/{contactId}/update/", requirements={"contactId": "[1-9][0-9]*"})
     */
    public function update($contactId)
    {
        // $this->getDoctrine()->getManager(); // écrire des entités
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
