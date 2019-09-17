<?php

namespace App\Controller;

use App\Entity\ScoffTest;
use App\Form\ScoffTestType;
use App\Repository\ScoffTestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoffController extends AbstractController
{
    /**
     * @Route("/scoff", name="scoff")
     */
    public function index(ScoffTestRepository $scoffTestRepository) : Response
    {
        $scoffTest = new ScoffTest();
        $form = $this->createForm(
            ScoffTestType::class,
            $scoffTest
        );

        return $this->render('scoff/index.html.twig', [
            'scofftests'=>$scoffTestRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }
}
