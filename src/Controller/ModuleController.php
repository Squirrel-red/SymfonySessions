<?php

namespace App\Controller;

use App\Entity\Module;
use App\Repository\ModuleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModuleController extends AbstractController
{
    #[Route('/module', name: 'app_module')]
    public function index(ModuleRepository $moduleRepository): Response
    {
        // On affiche la liste des modules
        // $modules = $moduleRepository->findAll();

        // On trie les modules sur le nom de la catégory dans l'ordre croissant
        // idem SELECT * FROM session ORDER BY nom ASC
        $modules = $moduleRepository->findBy([], ['name' => 'ASC']);

        return $this->render('module/index.html.twig', [
            'modules' => $modules
        ]);
    }

    // pour détailler la liste des modules --> module (sing.)
    #[Route('/module/{id}', name: 'show_module')]
    public function show(Module $module): Response
    {
        return $this->render('module/show.html.twig', [
            'module'  => $module
        ]);

    }
}
