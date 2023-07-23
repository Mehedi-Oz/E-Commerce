<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;

    private static $category;

    private static $image, $imageNewName, $directory, $imageUrl;

    public static function newCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::saveImage($request);
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = self::$image->getClientOriginalName();
        self::$directory = 'admin/upload-image/category/';
        self::$image->move(self::$directory, self::$imageNewName);
        self::$imageUrl = self::$directory . self::$imageNewName;

        return self::$imageUrl;
    }

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        if ($request->file('image')) {
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
            self::$imageUrl = self::saveImage($request);
        } else {
            self::$imageUrl = self::$category->image;
        }
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::$imageUrl;
        self::$category->status = $request->status;
        self::$category->save();
    }


    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if (file_exists(self::$category->image)) {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

}
