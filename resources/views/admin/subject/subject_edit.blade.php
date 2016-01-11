@extends('admin.master.master')
@section('title', 'Degree field Creation')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="jumbotron">
                    <h3>Enter a Degree Name(e.g : computer science engineering)</h3>
                    <form class="form-horizontal" action="{{ action('SubjectController@update', $subject->id) }}" method="post" enctype="multipart/form-data">
                        @if(session('status'))
                            <div class="alert alert-success fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p>{{ session('status') }}</p>
                            </div>
                        @endif
                        @include('errors.errors')
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="_method" value="put">

                        <fieldset>
                            <br>
                            <div class="form-group">
                                <label for="subject_name" class="col-md-4 control-label">Subject Name<sup style="color: red;">*</sup></label>
                                <div class="col-md-8">
                                    <input value="{{ $subject->subject_name }}"type="text" class="form-control" id="subject_name" placeholder="Subject Name" name="subject_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject_description" class="col-md-4 control-label">Subject Description<sup style="color: red;">*</sup></label>
                                <div class="col-md-8">
                                    <textarea name="subject_description" id="subject_description"rows="6" placeholder="Subject Description" class="form-control">{{ $subject->subject_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject_credit" class="col-md-4 control-label">Subject Credit<sup style="color: red;">*</sup></label>
                                <div class="col-md-8">
                                    <input value="{{ $subject->subject_credit }}"type="text" class="form-control" id="subject_credit" placeholder="Subject Credit" name="subject_credit">
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