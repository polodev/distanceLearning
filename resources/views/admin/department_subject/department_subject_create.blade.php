@extends('admin.master.master')
@section('title', 'Degree field Creation')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="jumbotron">
                    <h3>Choice which subject in which Department</h3>
                    <form class="form-horizontal" action="{{ URL::to('/admin/department_subject') }}" method="post" enctype="multipart/form-data">
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
                                <label for="department_id" class="col-md-4 control-label">Select a Department<sup style="color: red;">*</sup></label>
                                <div class="col-md-8">
                                    <select name="department_id" id="department_id" class="form-control">
                                        @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="subject_id" class="col-md-4 control-label">Select a subject<sup style="color: red;">*</sup></label>
                                <div class="col-md-8">
                                    <select name="subject_id" id="subject_id" class="form-control">
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="group" class="col-md-4 control-label">Group<sup style="color: red;">*</sup></label>
                                <div class="col-md-8">
                                    <input value="A" type="text" class="form-control" id="group" placeholder="Group" name="group">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
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