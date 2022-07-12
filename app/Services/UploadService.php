<?php

namespace App\Services;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use ImageFile;

class UploadService
{
    public function uploadImagesWM(array $images, string $directory, string $disk): array
    {

        foreach ($images as $image) {
            $imagePath = $image->store($directory, $disk);

            $imgFile = ImageFile::make(Storage::disk($disk)->path($imagePath));
            $options['imgWidth']  = $imgFile->width() - 120;
            $options['imgHeight'] = $imgFile->height() - 80;

            $imgFile->text('Коллекция Натальи Чумановой',
                            $options['imgWidth'],
                            $options['imgHeight'],
                            function($font) {
                                $font->file(Storage::disk('public')->path('fonts/Miama-Nueva.ttf'));
                                $font->size(35);
                                $font->color([255, 255, 255, 0.5]);
                                $font->align('right');
                                $font->valign('center');
                            })
                            ->save();

            $paths[] = $imagePath;


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



        }
        return $result;
    }
}
