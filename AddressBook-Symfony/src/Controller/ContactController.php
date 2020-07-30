<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\ContactType;
use App\Manager\ContactManager;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contacts")
 */
class ContactController extends AbstractController
{
    /** @var LoggerInterface */
    protected $logger;

    /** @var ContactManager */
    protected $contactManager;

    /**
     * ContactController constructor.
     * @param LoggerInterface $logger
     * @param ContactManager $contactManager
     */
    public function __construct(LoggerInterface $logger, ContactManager $contactManager)
    {
        $this->logger = $logger;
        $this->contactManager = $contactManager;
    }


    /**
     * @Route("/")
     */
    public function list(LoggerInterface $logger)
    {
        $logger->debug('list method called');

        $contacts = $this->contactManager->findAll();

        return $this->render('contact/list.html.twig', [
            'contacts' => $contacts,
            'title' => 'Contacts list'
        ]);
    }

    /**
     * @Route("/by-company/{company}/")
     */
    public function listByCompany(Company $company)
    {
        $contacts = $this->contactManager->findByCompany($company);

        return $this->render('contact/list.html.twig', [
            'contacts' => $contacts,
            'title' => 'Contacts list from ' . $company->getName()
        ]);
    }

    /**
     * @Route("/create/")
     */
    public function create(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $contactForm = $this->createForm(ContactType::class);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contact = $contactForm->getData(); // Contact

            $this->contactManager->save($contact);

            $this->addFlash('success', 'Le contact ' .
                $contact->getFirstName() . ' ' . $contact->getLastName() .
                ' a bien été créé');

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
        $contact = $this->contactManager->findWithCompany($contactId);

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
    public function update($contactId, Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $contact = $this->contactManager->find($contactId);

        if (!$contact) {
            throw $this->createNotFoundException("Contact $contactId not found");
        }

        $contactForm = $this->createForm(ContactType::class);
        $contactForm->setData($contact);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contact = $contactForm->getData(); // Contact

            $this->contactManager->save($contact);

            $this->addFlash('success', 'Le contact ' .
                $contact->getFirstName() . ' ' . $contact->getLastName() .
                ' a bien été modifié');

            return $this->redirectToRoute('app_contact_list');
        }

        return $this->render('contact/update.html.twig', [
            'contactForm' => $contactForm->createView(),
        ]);
    }

    /**
     * @Route("/{contactId}/delete/", requirements={"contactId": "[1-9][0-9]*"})
     */
    public function delete($contactId, Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $contact = $this->contactManager->find($contactId);

        if (!$contact) {
            throw $this->createNotFoundException("Contact $contactId not found");
        }

        if ($request->isMethod('POST')) {
            if ($request->get('confirm') === 'yes') {
                $this->contactManager->remove($contact);

                $this->addFlash('success', 'Le contact ' .
                    $contact->getFirstName() . ' ' . $contact->getLastName() .
                    ' a bien été supprimé');
            }

            return $this->redirectToRoute('app_contact_list');
        }

        return $this->render('contact/delete.html.twig', [
            'contact' => $contact,
        ]);
    }
}
