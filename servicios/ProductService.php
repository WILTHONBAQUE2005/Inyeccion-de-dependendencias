<?php
require_once __DIR__ . '/../interfaces/ProductRepositoryInterface.php';
require_once __DIR__ . '/../modelos/Product.php';

class ProductService {
    /** @var ProductRepositoryInterface */
    private $repo;  // sin tipo aquí

    /**
     * @param ProductRepositoryInterface $repo
     */
    public function __construct($repo) {
        $this->repo = $repo;
    }

    /**
     * @return array|Product[]
     */
    public function listar() {
        return $this->repo->getAll();
    }

    /**
     * @param int $id
     * @return Product|null
     */
    public function ver($id) {
        return $this->repo->getById((int)$id);
    }

    /**
     * @param string $name
     * @param float  $price
     * @return bool
     */
    public function agregar($name, $price) {
        $p = new Product(null, $name, (float)$price);
        return $this->repo->create($p);
    }

    /**
     * @param int    $id
     * @param string $name
     * @param float  $price
     * @return bool
     */
    public function editar($id, $name, $price) {
        $p = new Product((int)$id, $name, (float)$price);
        return $this->repo->update($p);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function eliminar($id) {
        return $this->repo->delete((int)$id);
    }
}
