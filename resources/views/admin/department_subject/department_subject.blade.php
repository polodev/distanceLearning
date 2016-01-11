@extends('admin.master.master')
@section('content')
    <div class="container">
        <div class="col-md-10">
            @if($departments->isEmpty())
                <h1>No Departments Available</h1>
            @else
                <h1>All Departments</h1>
                <ul>
                    @foreach($departments as $department)
                        <li><a href="{{ action('DepartmentSubjectController@single_department', $department->id) }}">{{ $department->department_name }}</a></li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
@endsection