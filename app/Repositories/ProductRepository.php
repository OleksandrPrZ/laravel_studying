<?php

namespace App\Repositories;

use App\Contracts\Product\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(): array
    {
        return Product::all()->toArray();
    }

    public function getById(int $id): Product
    {
        return Product::findOrFail($id);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function update(int $id, array $data): Product
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id): bool
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return true;
    }
}
