<?php

namespace App\Http\Controllers\Api\Product;

use App\Contracts\Product\ProductRepositoryInterface;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
        $this->middleware('auth:sanctum');
    }

    public function __invoke($id)
    {
        $this->productRepository->delete($id);

        return response()->json(null, 204);
    }
}
