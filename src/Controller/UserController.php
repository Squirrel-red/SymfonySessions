<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    // #[Route('/user', name: 'app_user')]
    // public function index(): Response
    // {
    //     return $this->render('user/index.html.twig', [
    //         'controller_name' => 'UserController',
    //     ]);
    // }
    #[Route('/user', name: 'app_user')]
    public function index(UserRepository $userRepository): Response
    {
        // On affiche la liste des utilisateurs
        // $users = $userRepository->findAll();

        // On trie les utilisateurs sur le nom de famille dans l'ordre croissant
        //idem SELECT * FROM user ORDER BY nom ASC
        $users = $userRepository->findBy([], ['lastName' => 'ASC']);


        return $this->render('user/index.html.twig', [
            'users'  => $users
        ]);
    }

        // pour détailler la liste des utilisateurs--> user (sing.)
        #[Route('/user/{id}', name: 'show_user')]
        public function show(User $user): Response
        {
            return $this->render('user/show.html.twig', [
                    'user'  => $user
            ]);
        
        }


}
