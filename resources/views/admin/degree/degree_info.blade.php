@extends('admin.master.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="degree_name">Department Under {{ $degree->degree_name }} </h1>
                <hr>

                @if($degree->departments->isEmpty())
                    <p>No Departments Found Under this degree</p>
                @else
                    <ul>
                        @foreach($degree->departments as $department)
                            <li><a href="{{ action('DepartmentController@show', $department->id) }}">{{ $department->department_name }}</a></li>
                        @endforeach
                    </ul>
                @endif

            </div>
        </div>
    </div>
@endsection