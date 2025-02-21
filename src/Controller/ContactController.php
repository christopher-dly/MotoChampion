<?php

namespace App\Controller;

use App\Document\ContactMessage;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Types\ObjectIdType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use MongoDB\BSON\ObjectId;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact_form', methods:['GET','POST'])]
    public function contactForm(Request $request, DocumentManager $dm): Response
    {
        $message = new ContactMessage();
        
        if ($request->isMethod('POST')) {
            $message->setName($request->request->get('name'))
                    ->setEmail($request->request->get('email'))
                    ->setMessage($request->request->get('message'));
            
            $dm->persist($message);
            $dm->flush();
            
            return $this->redirectToRoute('contact_form');
        }
        
        return $this->render('pages/contact.html.twig');
    }

    #[Route('/AdminMessage', name: 'AdminContact')]
    public function contactAdmin(DocumentManager $dm): Response
    {
        $messages = $dm->getRepository(ContactMessage::class)->findAll();
        return $this->render('admin/adminContact.html.twig', [
            'messages' => $messages,
        ]);
    }


    

//     #[Route('/test-insert', name: 'test_insert')]
// public function testInsert(DocumentManager $dm)
// {
//     $contact = new ContactMessage();
//     $contact->setName('John Doe');
//     $contact->setEmail('john.doe@example.com');
//     $contact->setMessage('Ceci est un test');

//     $dm->persist($contact);
//     $dm->flush();

//     return $this->json(['status' => 'success']);
// }

}
