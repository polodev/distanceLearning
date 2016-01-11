@extends('admin.master.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 well">
                @if($subjects->isEmpty())
                    <h3>No result found for <strong>{{ $search }}</strong> </h3>
                @else
                    <h3>Result for <strong>{{ $search }}</strong></h3>
                    <hr>
                    <table class="table table-striped">
                        <tr>
                            <th>Subject Name</th>
                            <th>Credit</th>
                            <th>Action</th>
                        </tr>
                        @foreach($subjects as $subject)
                            <tr>
                                <td><a href="{{ action('SubjectController@show', $subject->id) }}">{{ $subject->subject_name }}</a></td>
                                <td>{{ $subject->subject_credit }}</td>
                                <td>
                                    <a href="{!! action('SubjectController@edit', $subject->id) !!}" class="btn btn-material-teal pull-left">Edit</a>
                                    <form method="post" action="{!! action('SubjectController@destroy', $subject->id) !!}">
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