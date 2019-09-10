<?php

namespace App\Controller;

use App\Entity\ScoffTest;
use App\Form\ScoffTestType;
use App\Repository\ScoffTestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoffTestController extends AbstractController
{
    /**
     * @Route("/scoff-test", name="scoff_test")
     */
//    public function index(ScoffTestRepository $scoffTestRepository) : Response
//    {
//        return $this->render('scoff_test/index.html.twig', [
//            'scoff_tests'=> $scoffTestRepository->findAll()
//        ]);
//    }
    public function contact(Request $request, ScoffTestRepository $scoffTestRepository) : Response
    {
        $scoff = new ScoffTest();
        $form = $this->createForm(ScoffTestType::class, $scoff);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
        }
        return $this->render('scoff_test/index.html.twig', [
            'scoff_tests' => $scoffTestRepository->findAll(),
            'form' => $form->createView()
        ]);
    }
}
