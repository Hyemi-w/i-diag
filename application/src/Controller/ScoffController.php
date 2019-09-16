<?php

namespace App\Controller;

use App\Form\ScoffTestType;
use App\Repository\ScoffTestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ScoffController extends AbstractController
{
    /**
     * @Route("/scoff", name="scoff")
     */
    public function index(Request $request, ScoffTestRepository $scoffTestRepository)
    {
        $form = $this->createForm(
            ScoffTestType::class,
            null
        );
        return $this->render('scoff/index.html.twig', [
            'scofftests'=>$scoffTestRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }
}
