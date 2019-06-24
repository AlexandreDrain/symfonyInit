<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    
    /**
     * Affiche une page HTML
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }
}
