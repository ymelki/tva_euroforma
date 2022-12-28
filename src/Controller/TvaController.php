<?php

namespace App\Controller;

use App\Form\TvaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TvaController extends AbstractController
{
    #[Route('/tva', name: 'app_tva')]
    public function index(): Response
    {

        $form = $this->createForm(TvaType::class);
        return $this->renderForm('tva/index.html.twig', [
            'controller_name' => 'TvaController',
            'form'=>$form
        ]);
    }
}
