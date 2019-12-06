<?php

namespace App\Controller;
//namespace App\Controller\Cours;
use App\Entity\Cours;
use App\Repository\CoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;



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
     * @Route("/planning/globalNew", name="planning_globalNew", methods={"POST"})
     */
   
    public function new(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $cours = $serializer->deserialize($request->getContent(), Cours::class, 'json');
        $entityManager->persist($cours);
        $entityManager->flush();
        $data = [
            'status' => 201,
            'message' => 'Le cours a bien été ajouté'
        ];
        return new JsonResponse($data, 201);
    }
}
