<?php

namespace App\Controller;
//namespace App\Controller\Cours;

use App\Repository\CoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Cours;



class PlanningGlobalController extends AbstractController
{
    /**
     * @Route("/planning/global", name="planning_global")
     */
    public function index(CoursRepository $coursRepository)
    {
        $cours = $coursRepository->findAllCours();

        return $this->json(
            [
                'cours' => $cours,
            ]
        );
    }
     /**
     * @Route("/planning/globalFormateur", name="planning_globalFormateur")
     */
    public function indexFormateur(CoursRepository $coursRepository, Request $request)
    {
        $res = $request->query->get('id');
        $cours = $coursRepository->findAllCoursByFormateur($res);
        
        return $this->json(
            [
                'cours' => $cours,
            ]
        );
    }
     /**
     * @Route("/planning/globalCours", name="planning_globalCours")
     */
    public function indexCours(CoursRepository $coursRepository, Request $request)
    {
        $res = $request->query->get('libelle');
        $cours = $coursRepository->findAllByLibelle($res);
        
        return $this->json(
            [
                'cours' => $cours,
            ]
        );
    }

    /**
     * @Route("/planning/globalNew", name="planning_globalNew", methods={"GET","POST"})
     */
    public function addCours(Request $request): Response
    {
        $cours = new Cours();
        $request->getContent();
        $form = $this->createForm(Cours::class, $cours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cours);
            $entityManager->flush();

            return $this->redirectToRoute('planning_globalNew');
        }

        // return $this->render('admin/newsletter/new.html.twig', [
        //     'newsletter' => $newsletter,
        //     'form' => $form->createView(),
        //]);
    }
}
