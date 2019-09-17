<?php

namespace App\Controller;

use App\Entity\Test;
use App\Form\TestType;
use App\Repository\TestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(TestRepository $testRepository) : Response
    {
        $form = $this->createForm(TestType::class, null);

        return $this->render('test/index.html.twig', [
            'tests' => $testRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }
}