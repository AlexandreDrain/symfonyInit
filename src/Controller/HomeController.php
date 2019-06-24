<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    
    /**
     * Affiche une page HTML
     * @return Response
     */
    public function index(): Response
    {
        return new Response('<html><body>Bonjour! </body><html>');
    }
}
