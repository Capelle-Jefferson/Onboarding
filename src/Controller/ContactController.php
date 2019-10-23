<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class ContactController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->redirectToRoute("contact");
    }
    
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, ObjectManager $manager)
    {
        $contact = new Contact();
        $form = $this->createFormBuilder($contact)
                     ->add('name')
                     ->add('firstName')
                     ->add('mail', EmailType::class)
                     ->add('message')
                     ->getForm();
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($contact);
            $manager->flush();
            
            return $this->render('contact.html.twig', [
                'formContact' => $form->createView(),
                'validate' => true
            ]);
        }
        
        return $this->render('contact.html.twig', [
            'formContact' => $form->createView()
        ]);
    }

    
}
