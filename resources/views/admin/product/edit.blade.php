@extends('admin.master')

@section('title')
    Edit Product
@endsection

@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Edit Product Form</h3>
                    <h5 class="text-center text-success">{{session('message')}}</h5>
                    <hr>
                    <form class="form-horizontal p-t-20" method="POST"
                          action="{{route('product.update', ['id'=>$product->id])}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Category Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id" id="categoryId">
                                    <option value="" disabled selected> -- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option
                                            value="{{$category->id}}" {{$category->id==$product->category_id ? 'selected': ''}}>
                                            {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Sub-Category Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="subCategory_id" id="subCategoryId">
                                    <option value="" disabled selected> -- Select Sub-Category --</option>
                                    @foreach($subCategories as $subCategory)
                                        <option
                                            value="{{$subCategory->id}}" {{$subCategory->id==$product->subCategory_id ? 'selected': ''}}>{{$subCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Brand Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="brand_id">
                                    <option value="" disabled selected> -- Select Brand --</option>
                                    @foreach($brands as $brand)
                                        <option
                                            value="{{$brand->id}}"  {{$brand->id==$product->brand_id ? 'selected': ''}}>
                                            {{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Unit Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select class="form-control" name="unit_id">
                                    <option value="" disabled selected> -- Select Unit --</option>
                                    @foreach($units as $unit)
                                        <option
                                            value="{{$unit->id}}" {{$unit->id==$product->unit_id ? 'selected': ''}}>
                                            {{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Product Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id=""
                                       placeholder="product name" value="{{$product->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Product Code
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code" id=""
                                       placeholder="product code" value="{{$product->code}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Product Model
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="model" id=""
                                       placeholder="product model" value="{{$product->model}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Product Stock Amount
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="stock_amount" id=""
                                       placeholder="product stock amount" value="{{$product->stock_amount}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">
                                Product Price
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="regular_price" id=""
                                           placeholder="product regular price" value="{{$product->regular_price}}">
                                    <input type="number" class="form-control" name="selling_price" id=""
                                           placeholder="product selling price" value="{{$product->selling_price}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">
                                Short Description
                                <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                    <textarea class="form-control" name="short_description" rows="5"
                                              id="exampleInputEmail3"
                                              placeholder="short description">{{$product->short_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail34" class="col-sm-3 control-label">
                                Long Description
                                <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                    <textarea class="form-control summernote" name="long_description" rows="5"
                                              id="exampleInputEmail34"
                                              placeholder="long description">{{$product->long_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Feature Image
                                <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify" accept="image/*"/>
                                <img src="{{asset($product->image)}}" class="img-fluid"
                                     style="height: 50px; width:50px">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Other Image <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="other_image[]" multiple id="input-file-now" class="dropify"/>
                                @foreach($product->otherImages as $otherImage)
                                    <img src="{{asset($otherImage->image)}}" class="img-fluid"
                                         style="height: 50px; width:50px">
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1"
                                        {{$product->status ==1? 'checked': ''}}
                                    >Published</label>
                                <label><input type="radio" name="status"
                                              value="2" {{$product->status ==1? 'Unchecked': ''}}>Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">
                                    Update Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
