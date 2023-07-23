@extends('admin.master')

@section('title')
    Manage Products
@endsection

@section('body')

    <div class="row mt-3">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <h3 class="card-title text-center">All Products</h3>
                    <h5 class="text-center text-success">{{session('message')}}</h5>
                    <hr>
                    <div class="table-responsive m-t-40">
                        <table class="table table-striped border">
                            <tr>
                                <th>Product Id</th>
                                <td>{{$product->id}}</td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Code</th>
                                <td>{{$product->code}}</td>
                            </tr>
                            <tr>
                                <th>Product Model</th>
                                <td>{{$product->model}}</td>
                            </tr>
                            <tr>
                                <th>Product Category</th>
                                <td>{{$product->category->name}}</td>
                            </tr>
{{--                            <tr>--}}
{{--                                <th>Product Sub-Category</th>--}}
{{--                                <td>{{$product->subCategory->name}}</td>--}}
{{--                            </tr>--}}
                            <tr>
                                <th>Product Brand</th>
                                <td>{{$product->brand->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Unit</th>
                                <td>{{$product->unit->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Stock Amount</th>
                                <td>{{$product->stock_amount}}</td>
                            </tr>
                            <tr>
                                <th>Product Regular Price</th>
                                <td>{{$product->regular_price}} Taka</td>
                            </tr>
                            <tr>
                                <th>Product Selling Price</th>
                                <td>{{$product->selling_price}} Taka</td>
                            </tr>
                            <tr>
                                <th>Feature Image</th>
                                <td>
                                    <img src="{{asset($product->image)}}" class="img-fluid"
                                         style="height: 50px; width:50px">
                                </td>
                            </tr>
                            <tr>
                                <th>Other Image</th>
                                <td>
                                    @foreach($product->otherImages as $otherImage)
                                        <img src="{{asset($otherImage->image)}}" class="img-fluid"
                                             style="height: 50px; width:50px">
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Hit Count</th>
                                <td>{{$product->hit_count}}</td>
                            </tr>
                            <tr>
                                <th>Sales Count</th>
                                <td>{{$product->sales_count}}</td>
                            </tr>
                            <tr>
                                <th>Feature Status</th>
                                <td>{{$product->status ==1 ? 'Featured' : 'Not Featured'}}</td>
                            </tr>
                            <tr>
                                <th>Publication Status</th>
                                <td>{{$product->status ==1 ? 'Published' : 'Unpublished'}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
