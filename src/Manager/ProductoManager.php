<?php

namespace App\Manager;

use App\Repository\ProductoRepository;

Class ProductoManager {

    private ProductoRepository $productoRepository;

 public function __construct(ProductoRepository $producto_repository){
    
    $this->productoRepository=$producto_repository;

 }

 public function getProductos():array{

    return $this->productoRepository->findAll();

 }

}

