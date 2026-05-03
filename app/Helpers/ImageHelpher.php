<?php

namespace app\Helpers;

class ImageHelpher
{
    public static function uploadAndResize($file, $directory, $fileName, $width = null, $height = null)
    {
        $destinationPath = public_path($directory);
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        $extension = strtolower($file->getClientOriginalExtension());
        $image = null;

        //tentukan metode pembuatan gambar berdasarkan ekstensi file
        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                $image = imagecreatefromjpeg($file->getRealPath());
                break;
            case 'png':
                $image = imagecreatefrompng($file->getRealPath());
                break;
            case 'gif':
                $image = imagecreatefromgif($file->getRealPath());
                break;
            default:
                throw new \Exception('Unsupported image type');
        }
        if ($width) {
            $oldWidth = imagesx($image);
            $oldHeight = imagesy($image);
            $aspectRatio = $oldWidth / $oldHeight;
            if (!$height) {
                $height = $width / $aspectRatio;
            }
            $newImage = imagecreatetruecolor($width, $height);
            imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, $oldWidth, $oldHeight);
            imagedestroy($image);
            $image = $newImage;
        }
        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                imagejpeg($image, $destinationPath . '/' . $fileName);
                break;
            case 'png':
                imagepng($image, $destinationPath . '/' . $fileName);
                break;
            case 'gif':
                imagegif($image, $destinationPath . '/' . $fileName);
                break;
        }
        imagedestroy($image);
        return $fileName;
    }
}
