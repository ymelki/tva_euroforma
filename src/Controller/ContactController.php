<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        // on prend l'objet form qui va lire la request
        $form->handleRequest($request);

        // test si l'envoie en post et est valide est bien envoyé
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated

            // on stock dans une variable nommé task 
            // les données récupéré [tva=>12]
            $task = $form->getData();
                    
            
            return $this->renderForm('contact/envoye.html.twig', [
                'data'=>$task,
            ]);
        }





        return $this->renderForm('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form'=>$form
        ]);
    }
}
