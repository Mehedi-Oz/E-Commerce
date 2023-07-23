<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function index()
    {
        return view('admin.product.index', [
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
        ]);
    }

    public function getSubCategoryByCategory()
    {
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }

    public function manage()
    {
        return view('admin.product.manage', [
            'products' => Product::all()
        ]);
    }

    public function details($id)
    {
        return view('admin.product.details', [
            'product' => Product::find($id)
        ]);
    }

    public function create(Request $request)
    {
        $this->product = Product::newProduct($request);
        OtherImage::newOtherImage($request->other_image, $this->product->id);
        return back()->with('message', 'product Created Successfully!');
    }

    public function edit($id)
    {
        return view('admin.product.edit', [
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
            'product' => Product::find($id),
        ]);
    }


    public function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        if($request->other_image){
            OtherImage::updateOtherImage($request->other_image, $id);

        }
        return redirect('/product/manage/')->with('message', 'product Updated Successfully!');
    }


    public function delete($id)
    {
        Product::deleteProduct($id);
        OtherImage::deleteOtherImage($id);
        return redirect('/product/manage/')->with('message', 'product Deleted Successfully!');
    }
}
