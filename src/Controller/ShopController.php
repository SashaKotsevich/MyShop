<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    /**
     * @Route("/homepage", name="app_homepage")
     */
    public function homepage()
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $user= $this->getUser();
        return $this->render('shop/homepage.html.twig', [
            'user_name' => $user->getUsername(),
            'user_email'=> $user->getEmail(),
        ]);
    }
}
