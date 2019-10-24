<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Contact;
use App\Entity\DepartmentCompany;

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
    public function contact(Request $request, ObjectManager $manager, \Swift_Mailer $mailer)
    {
        $contact = new Contact();
        // Create form 
        $form = $this->createFormBuilder($contact)
                     ->add('name')
                     ->add('firstName')
                     ->add('mail_contact', EmailType::class)
                     ->add('message')
                     ->add('departmentCompany', EntityType::class, [
                         'class' => DepartmentCompany::class,
                         'placeholder' => false,
                     ])
                     ->getForm();
        
        // if form is submited, saves and sends mail
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // saves 
            $manager->persist($contact);
            $manager->flush();
            
            // sends mail
            $mail = (new \Swift_Message('Page contact'))
                    ->setFrom($contact->getMailContact())
                    ->setTo($contact->getDepartmentCompany()->getMail())
                    ->setBody($contact->getMessage(), 'text/html');
            $mailer->send($mail);
            
            return $this->render('contact.html.twig', [
                'formContact' => $form->createView(),
                'validate' => true,
            ]);
        }
        return $this->render('contact.html.twig', [
            'formContact' => $form->createView()
        ]);
    }    
}
