<?php

namespace App\Controller;


use Twig\Environment;
use App\Entity\Customers;
use App\Form\CustomersFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UsersController extends AbstractController
{
    public function show(Environment $twig)
    {
        $customers = new Customers();

        $form = $this->createForm(CustomersFormType::class);

        return new Response($twig->render('users/show.html.twig', [
            'users_form' => $form->crateView()
        ]));
    }

}