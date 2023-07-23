@extends('admin.master')

@section('title')
    Manage Category
@endsection

@section('body')

    <div class="row mt-3">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <h3 class="card-title text-center">All Categories</h3>
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
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td><img src="{{asset($category->image)}}" class="img-fluid"
                                             style="height: 50px; width:50px"></td>
                                    <td>{{$category->status==1? 'Published': 'Unpublished'}}</td>
                                    <td class="">
                                        <a href="{{route('category.edit',['id'=>$category->id])}}"
                                           class="btn btn-primary btn-sm mx-1">
                                            Edit
                                        </a>
                                        <a href="{{route('category.delete',['id'=>$category->id])}}"
                                           class="btn btn-danger btn-sm mx-1"
                                           onclick="return confirm('Are you sure to delete this?');">
                                        Delete
                                        </a>
                                        {{--                                        < form action="" method="POST">--}}
                                        {{--                                            @csrf--}}
                                        {{--                                            <input type="hidden" name="id" value="{{$category->id}}">--}}
                                        {{--                                            <input type="submit" class="btn btn-danger btn-sm" value="delete">--}}
                                        {{--                                        </form>--}}
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
