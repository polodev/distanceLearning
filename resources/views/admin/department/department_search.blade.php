@extends('admin.master.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 well">
                @if($departments->isEmpty())
                    <h3>No result found for <strong>{{ $search }}</strong> </h3>
                @else
                    <h3>Result for <strong>{{ $search }}</strong></h3>
                    <hr>

                    <table class="table table-striped">
                        <tr>
                            <th>Department Name</th>
                            <th>Degree</th>
                            <th>Credit</th>
                            <th>Action</th>
                        </tr>
                        @foreach($departments as $department)
                            <tr>
                                <td><a href="{{ action('DepartmentController@show', $department->id) }}">{{ $department->department_name }}</a></td>
                                <td><a href="{{ action('DegreeController@show', $department->degree_id) }}">{{ $department->degree->degree_name }}</a></td>
                                <td>{{ $department->department_credit }}</td>
                                <td>
                                    <a href="{!! action('DepartmentController@edit', $department->id) !!}" class="btn btn-material-teal pull-left">Edit</a>
                                    <form method="post" action="{!! action('DepartmentController@destroy', $department->id) !!}">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <input type="hidden" name="_method" id="method" value="delete">
                                        <button type="submit" class="btn btn-material-deep-orange">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection