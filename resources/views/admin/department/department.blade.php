@extends('admin.master.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 well">
                <form method="post" action="{{ URL::to('admin/department/search') }}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <div class="col-md-7">
                            <input class="form-control" placeholder="Search " type="text" name="department_search" id="department_search">
                        </div>
                        <div class="col-md-5">
                            <input type="submit" class="btn btn-material-blue-grey" value="Search">
                        </div>
                    </div>
                </form>
                @if($departments->isEmpty())
                    <h3>There are no Department </h3>
                @else

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
                <div class="pagination">
                    {!! $departments->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection