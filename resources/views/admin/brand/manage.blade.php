@extends('admin.master')

@section('title')
    Manage Brand
@endsection

@section('body')

    <div class="row mt-3">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <h3 class="card-title text-center">All Brands</h3>
                    <h5 class="text-center text-success">{{session('message')}}</h5>
                    <hr>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->description}}</td>
                                    <td><img src="{{asset($brand->image)}}" class="img-fluid"
                                             style="height: 50px; width:50px"></td>
                                    <td>{{$brand->status==1? 'Published': 'Unpublished'}}</td>
                                    <td class="">
                                        <a href="{{route('brand.edit',['id'=>$brand->id])}}"
                                           class="btn btn-primary btn-sm mx-1">
                                            Edit
                                        </a>
                                        <a href="{{route('brand.delete',['id'=>$brand->id])}}"
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
