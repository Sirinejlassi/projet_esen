<?php

namespace App\Controller;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AcceuilControlerController extends AbstractController
{
    #[Route('/', name: 'app_acceuil_controler')]
    public function index(EntityManagerInterface $manager): Response
    {
        $questionRepository = $manager->getRepository(Question::class);
        $question = $questionRepository ->findAll();
  
        return $this->render('acceuil/index.html.twig',[
        "questions" => $question 
           
        ]);
    }
    /**
     * Undocumented function
     *
     * @param string $slug slug de la question
     * @param integer $id idantifiant de la question
     * @return Response
     * 
     * @Route("/{slug}/{id}, name="show_question")
     */
    public function show(Question $question): Response{
       
        if($question == null){
            $this -> createNotFoundException(("la question demandé n'existe pas"));
        }
        return new Response("Hello");

    }
}
