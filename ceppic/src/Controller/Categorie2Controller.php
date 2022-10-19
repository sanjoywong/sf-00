<?php

namespace App\Controller;

use App\Entity\Categorie2;
use App\Form\Categorie2Type;
use App\Repository\Categorie2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie2')]
class Categorie2Controller extends AbstractController
{
    #[Route('/', name: 'app_categorie2_index', methods: ['GET'])]
    public function index(Categorie2Repository $categorie2Repository): Response
    {
        return $this->render('categorie2/index.html.twig', [
            'categorie2s' => $categorie2Repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_categorie2_new', methods: ['GET', 'POST'])]
    public function new(Request $request, Categorie2Repository $categorie2Repository): Response
    {
        $categorie2 = new Categorie2();
        $form = $this->createForm(Categorie2Type::class, $categorie2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorie2Repository->save($categorie2, true);

            return $this->redirectToRoute('app_categorie2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie2/new.html.twig', [
            'categorie2' => $categorie2,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie2_show', methods: ['GET'])]
    public function show(Categorie2 $categorie2): Response
    {
        return $this->render('categorie2/show.html.twig', [
            'categorie2' => $categorie2,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_categorie2_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Categorie2 $categorie2, Categorie2Repository $categorie2Repository): Response
    {
        $form = $this->createForm(Categorie2Type::class, $categorie2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorie2Repository->save($categorie2, true);

            return $this->redirectToRoute('app_categorie2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie2/edit.html.twig', [
            'categorie2' => $categorie2,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie2_delete', methods: ['POST'])]
    public function delete(Request $request, Categorie2 $categorie2, Categorie2Repository $categorie2Repository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorie2->getId(), $request->request->get('_token'))) {
            $categorie2Repository->remove($categorie2, true);
        }

        return $this->redirectToRoute('app_categorie2_index', [], Response::HTTP_SEE_OTHER);
    }
}
