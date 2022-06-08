<?php

namespace App\Controller;

use App\Entity\Customers;
use App\Form\CustomersType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_main")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request){

        $data = $this->getDoctrine()->getRepository(Customers::class)->findAll();


        $customers = new Customers();
        $form = $this->createForm(CustomersType::class, $customers);
        $form->handleRequest($request);

        /* Control form */
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($customers);
            $em->flush();

            $this->addFlash('notice','Submitted Successfully!');
        }

        return $this->render('main/create.html.twig',[
            'form' => $form->createView(),
            'contact' => $data
        ]);

    }
}
