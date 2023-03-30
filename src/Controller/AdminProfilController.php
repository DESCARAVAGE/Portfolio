<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Form\ProfilType;
use App\Repository\ProfilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/profil', name: 'admin_profil_')]
class AdminProfilController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ProfilRepository $profilRepository): Response
    {
        return $this->render('admin/admin_profil/index.html.twig', [
            'profils' => $profilRepository->findAll(),
        ]);
    }

    #[Route('/ajouter', name: 'add', methods: ['GET', 'POST'])]
    public function new(Request $request, ProfilRepository $profilRepository): Response
    {
        $profil = new Profil();
        $form = $this->createForm(ProfilType::class, $profil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilRepository->add($profil, true);
            $this->addFlash('success', 'Nouveau profil ajouté');
            return $this->redirectToRoute('app_admin_profil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_profil/new.html.twig', [
            'profil' => $profil,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/modifier', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Profil $profil,
        ProfilRepository $profilRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(ProfilType::class, $profil, [
            'validation_groups' => ['default']
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilRepository->add($profil, true);
            $this->addFlash('success', 'Évènement modifié');
            return $this->redirectToRoute('admin_profil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_profil/edit.html.twig', [
            'profil' => $profil,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Profil $profil, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $profil->getId(), $request->request->get('_token'))) {
            $entityManager->remove($profil);
        }
        $this->addFlash('success', 'Évènement supprimé');
        return $this->redirectToRoute('app_admin_profil_index', [], Response::HTTP_SEE_OTHER);
    }
}
