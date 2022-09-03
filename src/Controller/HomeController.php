<?php

namespace App\Controller;

use App\Form\SousSousFamilleType;
use App\Repository\SousSousFamilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(Request $request, SousSousFamilleRepository $sousSousFamilleRepository): Response
    {
        $form = $this->createForm(SousSousFamilleType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $id = $form->get('name')->getData()->getId();
            return $this->render('home/index.html.twig', [
                'form' => $form->createView(),
                'SousSousFamille' => $sousSousFamilleRepository->find($id)
            ]);
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
