<?php
interface ProductRepositoryInterface {
    public function getAll(): array;
    public function getById(int $id): ?Product;
    public function create(Product $p): bool;
    public function update(Product $p): bool;
    public function delete(int $id): bool;
}
