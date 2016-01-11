@extends('admin.master.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 well">
                @if($degrees->isEmpty())
                    <h3>There are no Degree </h3>
                @else

                <table class="table table-striped">
                    <tr>
                        <th>Degree Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($degrees as $degree)
                    <tr>
                        <td><a href="{{ action('DegreeController@show', $degree->id) }}">{{ $degree->degree_name }}</a></td>
                        <td>
                            <a href="{!! action('DegreeController@edit', $degree->id) !!}" class="btn btn-info pull-left">Edit</a>
                            <form method="post" action="{!! action('DegreeController@destroy', $degree->id) !!}">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <input type="hidden" name="_method" id="method" value="delete">
                                <button type="submit" class="btn btn-warning">Delete</button>
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