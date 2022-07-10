<?php

namespace App\Services;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    public function uploadFiles(array $images, string $directory, string $disk): array
    {

        foreach ($images as $image) {
            $paths[] = $image->store($directory, $disk);


        }
        return $paths;
    }

    public function deleteFile(string $path, string $disk)
    {
        $result = Storage::disk($disk)->delete($path);

        return $result;
    }

    public function deleteFiles(array $images, string $directory): array
    {

        foreach ($images as $image) {
            $path = $image->store($directory, 'public');


        }
        return $result;
    }
}
