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
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Stock Amount</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->code}}</td>
                                    <td>{{$product->stock_amount}}</td>
                                    <td><img src="{{asset($product->image)}}" class="img-fluid"
                                             style="height: 50px; width:50px"></td>
                                    <td>{{$product->status==1? 'Published': 'Unpublished'}}</td>
                                    <td class="">
                                        <a href="{{route('product.details',['id'=>$product->id])}}"
                                           class="btn btn-success btn-sm mx-1">
                                            details
                                        </a>
                                        <a href="{{route('product.edit',['id'=>$product->id])}}"
                                           class="btn btn-primary btn-sm mx-1">
                                            Edit
                                        </a>
                                        <a href="{{route('product.delete',['id'=>$product->id])}}"
                                           class="btn btn-danger btn-sm mx-1"
                                           onclick="return confirm('Are you sure to delete this?');">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
