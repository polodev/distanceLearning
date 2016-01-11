@extends('admin.master.master')
@section('title', 'Degree field Creation')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="jumbotron">
                    <h3>Enter a Degree Name(e.g : computer science engineering)</h3>
                    <form class="form-horizontal" action="{{ URL::to('/admin/department') }}" method="post" enctype="multipart/form-data">
                        @if(session('status'))
                            <div class="alert alert-success fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p>{{ session('status') }}</p>
                            </div>
                        @endif
                        @include('errors.errors')
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                        <fieldset>
                            <br>
                            <div class="form-group">
                                <label for="degree_id" class="col-md-2 control-label">Select a degree<sup style="color: red;">*</sup></label>
                                <div class="col-md-10">
                                    <select name="degree_id" id="degree_id" class="form-control">
                                        @foreach($degrees as $degree)
                                                <option value="{{ $degree->id }}">{{ $degree->degree_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="department_name" class="col-md-2 control-label">Department Name<sup style="color: red;">*</sup></label>
                                <div class="col-md-10">
                                    <input value="{{ old('department_name') }}"type="text" class="form-control" id="department_name" placeholder="Department Name" name="department_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="department_credit" class="col-md-2 control-label">Department Credit<sup style="color: red;">*</sup></label>
                                <div class="col-md-10">
                                    <input value="{{ old('department_credit') }}"type="text" class="form-control" id="department_credit" placeholder="Department Credit" name="department_credit">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button class="btn btn-default" type="reset">Cancel</button>
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection