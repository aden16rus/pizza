<?php

namespace App\Services;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileService
{
    /**
     * @param UploadedFile $file
     * @return false|string
     */
    public function storeUploadedFileAsPath(UploadedFile $file)
    {
        $path = $file->store('public/products');
        return str_replace('public/', '/storage/', $path);
    }

}
