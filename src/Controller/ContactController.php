<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use App\Utils\LibContact;
use App\Entity\Contact;
use App\Form\ContactType;

class ContactController extends AbstractController
{
    
    /**
     * @Route("/", name="contact")
     */
    public function contact(Request $request, ObjectManager $manager, LibContact $libContact, \Swift_Mailer $mailer)
    {
        $retIsSubmitted = false;
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        // if form is submited, saves and sends mail
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // saves 
            $manager->persist($contact);
            $manager->flush();
            
            // sends mail
            $libContact->sendMailContact($contact, $mailer);
            
            $retIsSubmitted = true;
        }
        return $this->render('contact.html.twig', [
            'formContact' => $form->createView(),
            'validate' => $retIsSubmitted
        ]);
    }    
}
