<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;

    private static $otherImage, $otherImages;
    private static $image, $imageNewName, $directory, $imageUrl, $imageExtension;

    public static function saveImage($image)
    {
        self::$imageExtension = $image->getClientOriginalExtension();
        self::$imageNewName = 'otherImage-' . rand() . '.' . self::$imageExtension;
        self::$directory = 'admin/upload-image/other-image/';
        $image->move(self::$directory, self::$imageNewName);
        self::$imageUrl = self::$directory . self::$imageNewName;

        return self::$imageUrl;
    }

    public static function newOtherImage($images, $id)
    {
        foreach ($images as $image) {
            self::$otherImage = new OtherImage();
            self::$otherImage->product_id = $id;
            self::$otherImage->image = self::saveImage($image);
            self::$otherImage->save();
        }
    }

    public static function updateOtherImage($images, $id)
    {
        self::deleteOtherImage($id);
        self::newOtherImage($images, $id);
    }


    public static function deleteOtherImage($id)
    {
        self::$otherImages = OtherImage::where('product_id', $id)->get();
        foreach (self::$otherImages as $image) {
            if (file_exists($image->image)) {
                unlink($image->image);
            }
            $image->delete();
        }
    }
}
