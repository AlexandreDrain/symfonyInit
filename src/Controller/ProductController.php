<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    
    /**
     * Affiche une page HTML
     * @return Response
     */
    public function liste(): Response
    {
        return $this->render('products/liste.html.twig');
    }
}
