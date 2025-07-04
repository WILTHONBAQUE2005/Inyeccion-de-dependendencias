<?php
require_once __DIR__ . '/../servicios/ProductService.php';

class ProductController {
    /** @var ProductService */
    private $service;  // <— elimina el tipo aquí

    /**
     * @param ProductService $svc
     */
    public function __construct($svc) {
        $this->service = $svc;
    }

    public function index() {
        $productos = $this->service->listar();
        header('Content-Type: application/json');
        echo json_encode($productos);
    }
}
