<?php

namespace App\Controller;

use App\Entity\Student;
use App\Repository\StudentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StudentController extends AbstractController
{
    // #[Route('/student', name: 'app_student')]
    // public function index(): Response
    // {
    //     return $this->render('student/index.html.twig', [
    //         'controller_name' => 'StudentController',
    //     ]);
    // }

    #[Route('/student', name: 'app_student')]
    public function index(StudentRepository $studentRepository): Response
    {
        // On affiche la liste des étudients
        // $students = $studentRepository->findAll();

        // On trie les étudients sur le nom de famille dans l'ordre croissant
        //idem SELECT * FROM student ORDER BY nom ASC
        $students = $studentRepository->findBy([], ['lastName' => 'ASC']);


        return $this->render('student/index.html.twig', [
            'students'  => $students
        ]);
    }

        // pour détailler la liste des étudients--> student (sing.)
        #[Route('/student/{id}', name: 'show_student')]
        public function show(Student $student): Response
        {
            return $this->render('student/show.html.twig', [
                    'student'  => $student
            ]);
        
        }
}
