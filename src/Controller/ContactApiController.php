<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest; 
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Utils\LibContact;
use App\Entity\Contact;
use App\Entity\DepartmentCompany;

class ContactApiController extends FOSRestController
{
    /**
     * @Rest\GET(
     *      path = "/departments",
     *      name = "getDepartments")
     * @Rest\View()
     */
    public function getDepartment(){
        $departments = $this->getDoctrine()
                ->getRepository(DepartmentCompany::class)
                ->findAll();
        return $departments;
    }
    
    /**
     * @Rest\Post(
     *      path = "/newContact",
     *      name = "newContact")
     * @Rest\View(StatusCode=Response::HTTP_CREATED)
     * @ParamConverter("contact", converter="fos_rest.request_body")
     */
    public function newContact(Request $request, Contact $contact, ConstraintViolationList $violations, LibContact $libContact, \Swift_Mailer $mailer){
        if(count($violations)){
            return $this->view($violations, Response::HTTP_BAD_REQUEST);
        }
        $department = $this->getDoctrine()->getRepository(DepartmentCompany::class)->find($request->get('departmentCompany'));
        if($department == null){
            return \FOS\RestBundle\View\View::create(['message' => 'departmentCompany not found'], Response::HTTP_NOT_FOUND);
        }
        $contact->setDepartmentCompany($department);
        $em = $this->getDoctrine()->getManager();
        $em->persist($contact);
        $em->flush();

        $libContact->sendMailContact($contact, $mailer);
        
        return $contact;
    }
}
