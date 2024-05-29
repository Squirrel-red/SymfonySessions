<?php

namespace App\Controller;

use App\Entity\Session;
use App\Repository\SessionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SessionController extends AbstractController
{
    #[Route('/session', name: 'app_session')]
    public function index(SessionRepository $sessionRepository): Response
    {
        // On affiche la liste des sessions
        $sessions = $sessionRepository->findAll();

        // On trie les employés sur le nom de session dans l'ordre croissant
        //SELECT * FROM session ORDER BY nom ASC
        // $sessions = $sessionRepository->findBy([], ['name' => 'ASC']);

        return $this->render('session/index.html.twig', [
            'sessions' => $sessions
        ]);
    }

    // pour détailler la liste des sessions --> session (sing.)
    #[Route('/session/{id}', name: 'show_session')]
    public function show(Session $session): Response
    {
        return $this->render('session/show.html.twig', [
            'session'  => $session
        ]);

    }
    
}
