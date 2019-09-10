<?php

namespace App\Controller;

use App\Repository\ScoffTestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoffTestController extends AbstractController
{
    /**
     * @Route("/scoff-test", name="scoff_test")
     */
    public function index(ScoffTestRepository $scoffTestRepository) : Response
    {
        return $this->render('scoff_test/index.html.twig', [
            'scoff_tests'=> $scoffTestRepository->findAll()
        ]);
    }
}
