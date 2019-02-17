<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function products($page, Request $request)
    {


        $brand = $request->get("brand");
        $minPrice = $request->get("minPrice");
        $maxPrice = $request->get('maxPrice');
        $products = $this->productRepository->findByFilter(
            $brand, $minPrice, $maxPrice, $page
        );

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
