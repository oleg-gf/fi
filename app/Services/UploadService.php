<?php

namespace App\Services;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    public function uploadFiles(array $images, string $directory): array
    {
         
        foreach ($images as $image) {
            $path = $image->store($directory, 'public');
            $imageUrls[] = Storage::url($path);
           
        }
        return $imageUrls;
    }

    public function deleteFiles(array $images, string $directory): array
    {
         
        foreach ($images as $image) {
            $path = $image->store($directory, 'public');
            $imageUrls[] = Storage::url($path);
           
        }
        return $result;
    }
}