<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Services\ProductService;

class StoreController extends Controller
{
    /**
     * @var ProductService
     */
    private ProductService $productService;

    /**
     * @param ProductService $productService
     */
    public function __construct(
        ProductService $productService
    )
    {
        $this->productService = $productService;
        $this->middleware('auth:sanctum');
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(StoreRequest $request)
    {
        try {
            $data = $request->validated();
            $product = $this->productService->createProductWithRelations($data);

            return response()->json($product, 201);
        } catch (\Exception $e) {

            return response()->json([
                'error' => 'An error occurred while processing your request',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
