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

        $filterParams['brand'] = $request->get("brand");
        $filterParams['minPrice'] = $request->get("minPrice");
        $filterParams['maxPrice'] = $request->get('maxPrice');

        if (!isset($filterParams['brand'])) {
            $filterParams['brand'] = 'select';
            $filterParams['minPrice'] = 200;
            $filterParams['maxPrice'] = 800;
        }

        $products = $this->productRepository->findByFilter(
            $filterParams['brand'], $filterParams['minPrice'],
            $filterParams['maxPrice'], $page
        );

       $countPages = intval(count($products)/60)+1;

        return $this->render(
            'shop/products.html.twig',
            ['products'     => $products, 'page' => $page, 'count' => $countPages,
             'filterParams' => $filterParams]
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
