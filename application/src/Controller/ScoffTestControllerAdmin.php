<?php

namespace App\Controller;

use App\Entity\ScoffTest;
use App\Form\ScoffTestType;
use App\Repository\ScoffTestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/scoff-test")
 */
class ScoffTestControllerAdmin extends AbstractController
{
    /**
     * @Route("/", name="scoff_test_index", methods={"GET"})
     */
    public function index(ScoffTestRepository $scoffTestRepository): Response
    {
        return $this->render('scoff_test_admin/index.html.twig', [
            'scoff_tests' => $scoffTestRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="scoff_test_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $scoffTest = new ScoffTest();
        $form = $this->createForm(ScoffTestType::class, $scoffTest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($scoffTest);
            $entityManager->flush();

            return $this->redirectToRoute('scoff_test_index');
        }

        return $this->render('scoff_test_admin/new.html.twig', [
            'scoff_test_admin' => $scoffTest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scoff_test_show", methods={"GET"})
     */
    public function show(ScoffTest $scoffTest): Response
    {
        return $this->render('scoff_test_admin/show.html.twig', [
            'scoff_test_admin' => $scoffTest,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="scoff_test_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ScoffTest $scoffTest): Response
    {
        $form = $this->createForm(ScoffTestType::class, $scoffTest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('scoff_test_index');
        }

        return $this->render('scoff_test_admin/edit.html.twig', [
            'scoff_test_admin' => $scoffTest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scoff_test_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ScoffTest $scoffTest): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scoffTest->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($scoffTest);
            $entityManager->flush();
        }

        return $this->redirectToRoute('scoff_test_index');
    }
}
