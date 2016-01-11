@extends('admin.master.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3>Enter Degree Name(e.g - Graduation, PostGraduation, Phd, Certificate)</h3>
                    <form class="form-horizontal" action="{{ action('DegreeController@update', $degree->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" id="" value="put">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        @if(session('status'))
                            <p class="alert alert-success">{{ session('status') }}</p>
                        @endif
                        @include('errors.errors')

                        <fieldset>
                            <br>
                            <div class="form-group">
                                <label for="degree_name" class="col-md-2 control-label">Degree Name<sup style="color: red;">*</sup></label>
                                <div class="col-md-10">
                                    <input value="{{ $degree->degree_name }}"type="text" class="form-control" id="degree_name" placeholder="Degree Name" name="degree_name">
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