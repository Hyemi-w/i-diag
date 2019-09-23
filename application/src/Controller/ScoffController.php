<?php

namespace App\Controller;

use App\Entity\ScoffTest;
use App\Form\ScoffTestType;
use App\Repository\ScoffTestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ScoffController extends AbstractController
{
    /**
     * @Route("/scoff", name="scoff")
     * @param ScoffTestRepository $scoffTestRepository
     * @param Request $request
     * @return Response
     */
    public function index(ScoffTestRepository $scoffTestRepository, Request $request): Response
    {
        $scoffTest = new ScoffTest();
        $questions = $scoffTestRepository->findAll();

        $form = $this->createForm(
            ScoffTestType::class,
            $questions
        );

        $form->handleRequest($request);

        return $this->render('scoff/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
