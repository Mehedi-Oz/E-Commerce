<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    private static $subCategory;

    private static $image, $imageNewName, $directory, $imageUrl;

    public static function newSubCategory($request)
    {
        self::$subCategory = new SubCategory();
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::saveImage($request);
        self::$subCategory->status = $request->status;
        self::$subCategory->save();
    }

    public static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageNewName = self::$image->getClientOriginalName();
        self::$directory = 'admin/upload-image/sub-category/';
        self::$image->move(self::$directory, self::$imageNewName);
        self::$imageUrl = self::$directory . self::$imageNewName;
        return self::$imageUrl;
    }

    public static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);
        if ($request->file('image')) {
            if (file_exists(self::$subCategory->image)) {
                unlink(self::$subCategory->image);
            }
            self::$imageUrl = self::saveImage($request);
        }
        else{
            self::$imageUrl = self::$subCategory->image;
        }
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::$imageUrl;
        self::$subCategory->status = $request->status;
        self::$subCategory->save();
    }

    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        if (file_exists(self::$subCategory->image)) {
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
