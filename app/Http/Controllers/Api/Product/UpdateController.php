<?php

namespace App\Http\Controllers\Api\Product;

use App\Contracts\Product\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;

class UpdateController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->middleware('auth:sanctum');
    }

    public function __invoke(UpdateRequest $request, $id)
    {
        $data = $request->validate();

        $product = $this->productRepository->update($id, $data);

        return response()->json($product, 200);
    }
}
