<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ParcoursPedagogiqueController extends AbstractController
{
    /**
     * @Route("/parcours/pedagogique", name="parcours_pedagogique")
     */
    public function index()
    {
        return $this->render('parcours_pedagogique/index.html.twig', [
            'controller_name' => 'ParcoursPedagogiqueController',
        ]);
    }
}
