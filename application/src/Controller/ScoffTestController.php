<?php

namespace App\Controller;

use App\Entity\ScoffTest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ScoffTestType;

class ScoffTestController extends AbstractController
{
    /**
     * @Route("/scoff-test", name="scoff_test")
     */
    public function index()
    {
        $scoff = new ScoffTest();
        $form = $this-> createForm(ScoffTestType::class, $scoff);
        $form-> handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $request = $_POST;
        }
        return $this->render('scoff_test/index.html.twig', [
            'controller_name' => 'ScoffTestController',
        ]);
    }
}
