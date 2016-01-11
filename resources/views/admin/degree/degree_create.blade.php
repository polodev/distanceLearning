@extends('admin.master.master')
@section('title', 'Degree field Creation')
@section('content')
    <div class="container">
       <div class="row">
           <div class="col-md-10">
               <div class="jumbotron">
                   <h3>Enter Degree Name(e.g - Graduation, Post Graduation)</h3>
                   <form class="form-horizontal" action="{{ URL::to('/admin/degree') }}" method="post" enctype="multipart/form-data">
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
                               <label for="degree_name" class="col-md-2 control-label">Degree Name<sup style="color: red;">*</sup></label>
                               <div class="col-md-10">
                                   <input value="{{ old('degree_name') }}"type="text" class="form-control" id="degree_name" placeholder="Degree Name" name="degree_name">
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