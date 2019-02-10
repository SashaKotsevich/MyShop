<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/user/products/{page<\d+>?1}", name="app_products")
     */
    public function products($page)
    {

        $user = $this->getUser();
        $products = $this->productRepository->findPage($page);
        $count = intval($this->productRepository->productsCount()/60);
        if($page>1)$pages[]=["id"=>1,"class"=>"page-item"];
        if($page>3)$pages[]=["id"=>$page-2,"class"=>"page-item"];
        if($page>2)$pages[]=["id"=>$page-1,"class"=>"page-item"];
        $pages[]=["id"=>$page,"class"=>"page-item active"];
        if($count>2&&$count-1>$page)$pages[]=["id"=>$page+1,"class"=>"page-item"];
        if($count>3&&$count-2>$page)$pages[]=["id"=>$page+2,"class"=>"page-item"];
        if($count>4&&$count!=$page)$pages[]=["id"=>$count,"class"=>"page-item"];




        return $this->render(
            'shop/products.html.twig', ['user_name'  => $user->getUsername(),
                                        'user_email' => $user->getEmail(),
                                        'products'   => $products,
                                        'pages'      => $pages,
                                        'page'       =>$page,]
        );
    }

    /**
     * @Route("/user/product/{id}",name="app_product_show")
     */
    public function productShow(Product $product)
    {

        return $this->render(
            'shop/showProduct.html.twig', ['product' => $product,]
        );

    }


}
