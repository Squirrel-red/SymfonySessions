<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(CategoryRepository $categoryRepository): Response
    {

        // pour afficher toutes les catégories et détailler la liste
        $categories = $categoryRepository->findBy([], ["name" => "ASC"]); 
        
        
        return $this->render('category/index.html.twig', [
            'categories'  => $categories
        ]);
    }

    // pour détailler la liste des categories --> category (sing.)
    #[Route('/category/{id}', name: 'show_category')]
    public function show(Category $category): Response
    {
        return $this->render('category/show.html.twig', [
                'category'  => $category
        ]);
    
    }

}
