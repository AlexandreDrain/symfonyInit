<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Produit;

class ProductController extends AbstractController
{
    /**
     * Affiche une page HTML (Liste des produits)
     * @return Response
     */
    public function liste(): Response
    {
        // Récupération de .....
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        //
        $products = $repository->findAll();
        //
        return $this->render('products/liste.html.twig', ['products' => $products]);
    }
    /**
     * Affiche une page HTML (détails du produit)
     * @return Response
     */
    public function show(string $slug): Response
    {
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        $product = $repository->findOneBy(['slug' => $slug]);
        return $this->render('products/show.html.twig', ['product' => $product]);
    }
    /**
     * Affiche une page HTML (Création d'un produit)
     * @var  Request
     * @return Response
     */
    public function create(Request $requestHTTP): Response
    {
        $this->addFlash('warning', 'Voulez-vous vraiment créer un porduit ?');
        return $this->render('products/create.html.twig');
    }
}
