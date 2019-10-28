<?php
namespace App\Utils;
use App\Entity\Contact;

class LibContact
{
    public function sendMailContact(Contact $contact, \Swift_Mailer $mailer){    
        $mail = (new \Swift_Message('Page contact'))
                ->setFrom($contact->getMailContact())
                    ->setTo($contact->getDepartmentCompany()->getMail())
                    ->setBody($contact->getMessage(), 'text/html');
        $mailer->send($mail);
    }
}
