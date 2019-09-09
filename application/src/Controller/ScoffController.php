<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ScoffController extends AbstractController
{
    /**
     * @Route("/scoff", name="scoff")
     */
    public function index()
    {
        return $this->render('scoff/index.html.twig', [
            'controller_name' => 'ScoffController',
        ]);
    }
}
