<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use http\Params;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }




    /**
     * @Route("/products/{page<\d+>?1}", name="app_products")
     */
    public function products($page, Request $request)
    {
        // TODO connect filter form



        $products = $this->productRepository->findProducts($page);
        $count = intval($this->productRepository->productsCount() / 60);

        return $this->render(
            'shop/products.html.twig',
            ['products' => $products, 'page' => $page, 'count' => $count]
        );
    }

    /**
     * @Route("/product/{id}",name="app_product_show")
     */
    public function productShow(Product $product)
    {

        return $this->render(
            'shop/showProduct.html.twig', ['product' => $product,]
        );

    }


}
