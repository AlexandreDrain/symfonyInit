<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Produit;
use App\Entity\Category;

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
        $products = $repository->findBy(["isPublished" => true]);
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
        $product = $repository->findOneBy(['slug' => $slug, 'isPublished' => true]);
        if (!$product) {
            throw $this->createNotFoundException('Produit innexistant');
        }
         return $this->render('products/show.html.twig', ['product' => $product]);
    }
    /**
     * Affiche une page HTML (Création d'un produit)
     * @var  Request
     * @return Response
     */
    public function create(Request $requestHTTP): Response
    {
        // Récuperation d'une catégorie
        $category = $this->getDoctrine()->getRepository(Category::class)->find(1);

        // Création et remplissage du produit
        $product = new Produit();
        $product
            ->setProductName('ventilateur')
            ->setProductDescription('Pour faire de l\'air frais')
            ->setImageName('ventile.jpg')
            ->setIsPublished(true)
            ->setPrice(59.99)
            ->setCategory($category);
        ;
        dd($product);
        return $this->render('products/create.html.twig');
    }
}
