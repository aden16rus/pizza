<?php

namespace App\Services;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileService
{
    /**
     * @param UploadedFile $file
     * @return string
     */
    public function storeUploadedFileAsPath(UploadedFile $file): string
    {
        $path = $file->store('public/products');
        return str_replace('public/', '/storage/', $path);
    }

}
