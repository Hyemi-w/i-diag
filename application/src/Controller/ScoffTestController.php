<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ScoffTestController extends AbstractController
{
    /**
     * @Route("/scoff/test", name="scoff_test")
     */
    public function index()
    {
        return $this->render('scoff_test/index.html.twig', [
            'controller_name' => 'ScoffTestController',
        ]);
    }
}
