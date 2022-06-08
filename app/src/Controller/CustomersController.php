<?php

namespace App\Controller;


use Twig\Environment;
use App\Entity\Customers;
use App\Form\CustomersFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomersController extends AbstractController
{
    public function show(Environment $twig)
    {
        /**
         * @Route("/show")
         */
        $customers = new Customers();

        $form = $this->createForm(CustomersFormType::class);

        return new Response($twig->render('customers/show.html.twig', [
            'customers_form' => $form->crateView()
        ]));
    }

}