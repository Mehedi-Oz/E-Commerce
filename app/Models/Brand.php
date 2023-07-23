<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private static $brand;

    private static $image, $imageNewName, $directory, $imageUrl;

    public static function newBrand($request)
    {
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::saveImage($request);
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = self::$image->getClientOriginalName();
        self::$directory = 'admin/upload-image/brand/';
        self::$image->move(self::$directory, self::$imageNewName);
        self::$imageUrl = self::$directory . self::$imageNewName;

        return self::$imageUrl;
    }

    public static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);
        if ($request->file('image')) {
            if (file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
            self::$imageUrl = self::saveImage($request);
        }
        else{
            self::$imageUrl = self::$brand->image;
        }
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::$imageUrl;
        self::$brand->status = $request->status;
        self::$brand->save();
    }


    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        if (file_exists(self::$brand->image)) {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }
}
