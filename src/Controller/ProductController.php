<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    
    /**
     * Affiche une page HTML (détails de produit)
     * @return Response
     */
    public function show(string $slug): Response
    {
        dump($slug);
        return $this->render('products/show.html.twig');
    }
}
