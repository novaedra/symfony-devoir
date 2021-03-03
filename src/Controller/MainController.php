<?php

namespace App\Controller;

use App\Entity\Media;
use App\Entity\Token;
use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     * @param MediaRepository $mediaRepository
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'routesList' => [
                ["content" => "/ : documentation des routes et page d'accueil - GET","class" => "home"],
                ["content" => "/token : géneration d'un nouveau token - GET","class" => "home"],
                ["content" => "/media : vue de tous les media (film/series) - GET","class" => "media"],
                ["content" => "/media : vue de tous les media (film/series) - GET","class" => "media"],
                ["content" => "/media/{id} : vue d'un media par son id - GET","class" => "media"],
                ["content" => "/media/create : creation d'un nouveau media - POST","class" => "media"],
            ]
        ]);
    }

    /**
     * @Route("/token", name="getToken")
     */
    public function getToken(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $token = new Token();
        $token
            ->setToken(uniqid('A-T:'))
            ->setCreatedAt(new \DateTime('now'));
        $entityManager->persist($token);
        $entityManager->flush();

        $token = $this->get('serializer')->serialize($token, 'json');
        $response = new Response($token);
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode(Response::HTTP_CREATED);
        return $response;
    }
}
