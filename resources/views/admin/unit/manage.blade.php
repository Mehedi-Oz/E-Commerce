@extends('admin.master')

@section('title')
    Manage Unit
@endsection

@section('body')

    <div class="row mt-3">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                    <h3 class="card-title text-center">All Units</h3>
                    <h5 class="text-center text-success">{{session('message')}}</h5>
                    <hr>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($units as $unit)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$unit->name}}</td>
                                    <td>{{$unit->code}}</td>
                                    <td>{{$unit->description}}</td>
                                    <td>{{$unit->status==1? 'Published': 'Unpublished'}}</td>
                                    <td class="">
                                        <a href="{{route('unit.edit',['id'=>$unit->id])}}"
                                           class="btn btn-primary btn-sm mx-1">
                                            Edit
                                        </a>
                                        <a href="{{route('unit.delete',['id'=>$unit->id])}}"
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
