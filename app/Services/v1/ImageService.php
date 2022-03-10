<?php


namespace App\Services\v1;


class ImageService
{
    public function store(array $data)
    {
        $imagesFsDirectory = 'images';

        $fileSystemStorageService = new FileSystemStorageService();

        $path = $fileSystemStorageService->saveFile($data['file'], $imagesFsDirectory);
        $url = $fileSystemStorageService->getFileUrl($path);

        return [
            'path' => $path,
            'url' => $url,
        ];
    }
}
