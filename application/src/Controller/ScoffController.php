<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ScoffController extends AbstractController
{
    /**
     * @Route("/scoff", name="scoff")
     */
    public function index(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('question', ChoiceType::class, ['choices' => [
                'Oui' => '1',
                'Non' => '2'],
                'multiple'=>false,'expanded'=>true])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
        }

        return $this->render('scoff/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
