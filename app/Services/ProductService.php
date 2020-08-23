<?php

namespace App\Services;


use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
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
        $this->product->fill($request->all());
        $this->product->image = $this->fileService->storeUploadedFileAsPath($request->image);
        $this->product->save();

        return $this->product;
    }

    public function updateProduct(Request $request, Product $product)
    {
        $product->fill($request->all());
        if ($request->image) {
            $product->image = $this->fileService->storeUploadedFileAsPath($request->image);
        }
        $product->save();

        return $product;
    }

    /**
     * @return Collection|null
     */
    public function getAllProducts() :?Collection
    {
        return Product::all();
    }
}
