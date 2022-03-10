<?php


namespace App\Services\v1;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileSystemStorageService
{

    public function saveFile(UploadedFile $file, $directory)
    {
        return $file->store($directory);
    }

    public function getFileUrl($path): string
    {
        return Storage::url($path);
    }

    public function deleteFile($path): bool
    {
        return Storage::delete($path);
    }

}
