<?php

namespace App\Controller;

use App\Form\TvaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class TvaController extends AbstractController
{
    #[Route('/tva', name: 'app_tva')]
    public function index(Request $request): Response
    {

        $form = $this->createForm(TvaType::class);
        // on prend l'objet form qui va lire la request
        $form->handleRequest($request);

        // test si l'envoie en post et est valide est bien envoyé
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated

            // on stock dans une variable nommé task 
            // les données récupéré [tva=>12]
            $task = $form->getData();
            // cacul  de la TVA STOCKE DANS LA VAR TTC
            $ttc=$task["tva"]*1.2;
            // dd($task);            
            
            return $this->renderForm('tva/caclul.html.twig', [
                'controller_name' => 'TvaController',
                'montant'=>$task,
                'ttc' =>$ttc
            ]);
        }

         return $this->renderForm('tva/index.html.twig', [
            'controller_name' => 'TvaController',
            'form'=>$form
        ]);
    }
}
