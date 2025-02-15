<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class FileUploadHelper
{
    /**
     * Upload a file to storage.
     *
     * @param UploadedFile $file
     * @param string $path
     * @param string $disk
     * @return string|false
     */
    public static function uploadFile(UploadedFile $file, string $path, string $disk = 'public')
    {
        return $file->store($path, $disk);
    }

    /**
     * Delete a file from storage.
     *
     * @param string $path
     * @param string $disk
     * @return bool
     */
    public static function deleteFile(string $path, string $disk = 'public')
    {
        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->delete($path);
        }
        return false;
    }

    /**
     * Update a file in storage.
     *
     * @param UploadedFile|null $newFile
     * @param string|null $oldFilePath
     * @param string $path
     * @param string $disk
     * @return string|null
     */
    public static function updateFile(?UploadedFile $newFile, ?string $oldFilePath, string $path, string $disk = 'public')
    {
        if ($newFile) {
            if ($oldFilePath) {
                self::deleteFile($oldFilePath, $disk);
            }
            return self::uploadFile($newFile, $path, $disk);
        }
        return $oldFilePath;
    }

    /**
     * Upload an image file.
     *
     * @param UploadedFile $file
     * @param string $path
     * @param string $disk
     * @return string|false
     */
    public static function uploadImage(UploadedFile $file, string $path, string $disk = 'public')
    {
        if (!in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            throw new \InvalidArgumentException('Invalid image file type.');
        }
        return self::uploadFile($file, $path, $disk);
    }

    /**
     * Upload a video file.
     *
     * @param UploadedFile $file
     * @param string $path
     * @param string $disk
     * @return string|false
     */
    public static function uploadVideo(UploadedFile $file, string $path, string $disk = 'public')
    {
        if (!in_array($file->getClientOriginalExtension(), ['mp4', 'avi', 'mov', 'wmv'])) {
            throw new \InvalidArgumentException('Invalid video file type.');
        }
        return self::uploadFile($file, $path, $disk);
    }
}