<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;

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
     * @param string $title
     * @param string $description
     * @param UploadedFile|null $image
     * @param float $price
     * @return Product
     */
    public function storeProduct(string $title, string $description, ?UploadedFile $image, float $price): Product
    {
        return $this->saveProduct($this->product, $title, $description, $image, $price);
    }

    /**
     * @param Product $product
     * @param string $title
     * @param string $description
     * @param UploadedFile $image
     * @param float $price
     * @return Product
     */
    public function updateProduct(Product $product, string $title, string $description, UploadedFile $image, float $price): Product
    {
        return $this->saveProduct($product, $title, $description, $image, $price);
    }

    /**
     * @param Product $product
     * @param string $title
     * @param string $description
     * @param UploadedFile $image
     * @param float $price
     * @return Product
     */
    private function saveProduct(Product $product, string $title, string $description, UploadedFile $image, float $price): Product
    {
        $product->title = $title;
        $product->description = $description;
        $product->price = $price;
        $product->image = $this->fileService->storeUploadedFileAsPath($image);
        $product->save();

        return $product;
    }

    /**
     * @return Collection|null
     */
    public function getAllProducts(): ?Collection
    {
        return Product::all();
    }

    /**
     * @param int $quantity
     * @return Paginator
     */
    public function getPaginated(int $quantity): Paginator
    {
        return $this->product->paginate($quantity);
    }
}
