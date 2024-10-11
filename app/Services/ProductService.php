<?php

namespace App\Services;

use App\Contracts\Product\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;

class ProductService
{
    /**
     * @var ProductRepositoryInterface
     */
    protected ProductRepositoryInterface $productRepository;

    /**
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param array $data
     * @return Product
     * @throws Exception
     */
    public function createProductWithRelations(array $data): Product
    {
        DB::beginTransaction();

        $tagsIds = $data['tags'] ?? [];
        $colorsIds = $data['colors'] ?? [];
        unset($data['tags'], $data['colors']);
        try {
            $product = $this->productRepository->create($data);
            if (!empty($tagsIds)) {
                $product->tags()->sync($tagsIds);
            }
            if (!empty($colorsIds)) {
                $product->colors()->sync($colorsIds);
            }
            DB::commit();

            return $product;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
