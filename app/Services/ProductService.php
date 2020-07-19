<?php

namespace App\Services;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductService
{
    /**
     * @var Product
     */
    private $product;
    /**
     * @var FileService
     */
    private $fileService;

    /**
     * ProductService constructor.
     * @param Product $product
     * @param FileService $fileService
     */
    public function __construct(Product $product, FileService $fileService)
    {
        $this->product = $product;
        $this->fileService = $fileService;
    }

    /**
     * @param Request $request
     */
    public function storeProduct(Request $request)
    {
        $product = new Product();
        $product->fill($request->all());
        $product->image = $this->fileService->storeUploadedFileAsPath($request->image);
        $product->save();

        return $product;
    }
}
