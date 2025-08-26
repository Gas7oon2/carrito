<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Producto;
use Doctrine\ORM\EntityManagerInterface;

class ProductoController extends AbstractController
{
    #[Route('/', name: 'listar_productos')]
    public function listarProductos(): Response
    {
        // Renderiza la lista de productos (Twig)
        return $this->render('producto/lista.html.twig');
    }

    #[Route('/product', name: 'create_product')]
    public function crearProducto(EntityManagerInterface $entityManager): Response
    {
        // Creamos 10 productos
        for ($i = 1; $i <= 10; $i++) {
            $producto = new Producto();
            $producto->setNombre('Producto '.$i);
            $producto->setDescripcion('Lorem ipsum '.$i);
            $producto->setPrecio(mt_rand(10, 100));
            $producto->setImagen('images/producto'.$i.'.jpg');

            // Persistimos cada producto con $entityManager
            $entityManager->persist($producto);
        }

        // Guardamos todos los productos en la base
        $entityManager->flush();

        return new Response('Se han creado 10 productos correctamente.');
    }
}
