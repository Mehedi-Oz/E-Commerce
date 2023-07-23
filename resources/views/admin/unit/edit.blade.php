@extends('admin.master')

@section('title')
    Edit Unit
@endsection

@section('body')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Update Unit Form</h3>
                    <h5 class="text-center text-success">{{session('message')}}</h5>
                    <hr>
                    <form class="form-horizontal p-t-20" method="POST"
                          action="{{route('unit.update', ['id'=>$unit->id])}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Unit Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{$unit->name}}"
                                       id="exampleInputuname3"
                                       placeholder="unit name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Unit Code
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{$unit->code}}"
                                       id="exampleInputuname3"
                                       placeholder="unit name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">
                                Unit Description
                                <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                    <textarea class="form-control" name="description" rows="5" id="exampleInputEmail3"
                                              placeholder="description">{{$unit->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3">
                                    <input type="radio" name="status"
                                           value="1" {{$unit->status ==1? 'checked' : ''}} checked>
                                    Published
                                </label>
                                <label>
                                    <input type="radio" name="status" value="2"
                                        {{$unit->status ==2? 'checked' : ''}}>
                                    Unpublished
                                </label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">
                                    Update Unit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
