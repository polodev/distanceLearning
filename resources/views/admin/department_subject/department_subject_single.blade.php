@extends('admin.master.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 well">
                <h1>Subjec Under {{ $department_name }} Department</h1>
                <hr>
                <br><br>
                @if($groups->isEmpty())
                    <h3>There are no Subjects under this Department </h3>
                @else

                    @foreach($groups as $group)
                        <h3>
                            Group {{ $group }} :
                            @if($group == 'A')
                                This is Compulsory
                            @else
                                Choose Minimum two subjects from This group
                            @endif

                        </h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Subject Name</th>
                                <th>Department Name</th>
                                <th>Action</th>
                            </tr>
                            @foreach(${$group} as $single_group)
                                <tr>
                                    <td><a href="{{ action('SubjectController@show', $single_group->subject_id) }}">{{ $single_group->subject->subject_name }}</a></td>
                                    <td><a href="{{ action('DepartmentController@show', $single_group->department_id) }}">{{ $single_group->department->department_name}}</a></td>
                                    <td>
                                        <a href="{!! action('DepartmentSubjectController@edit', $single_group->id) !!}" class="btn btn-material-teal pull-left">Edit</a>
                                        <form method="post" action="{!! action('DepartmentSubjectController@destroy', $single_group->id) !!}">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                            <input type="hidden" name="_method" id="method" value="delete">
                                            <button type="submit" class="btn btn-material-deep-orange">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection