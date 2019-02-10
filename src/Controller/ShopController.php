<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    private $productRepository;
    public function __construct( ProductRepository $productRepository)
    {
        $this->productRepository=$productRepository;
    }

    /**
     * @Route("/homepage", name="app_homepage")
     */
    public function homepage()
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $user= $this->getUser();

        $products=$this->productRepository->allData();
        return $this->render('shop/homepage.html.twig', [
            'user_name' => $user->getUsername(),
            'user_email'=> $user->getEmail(),
            'products'=>$products,
        ]);
    }
}
