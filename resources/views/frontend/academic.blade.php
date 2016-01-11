@extends('frontend.master.master')
@section('content')
    <div class="container">
        <h1 class="text-center">Available Program for Certification</h1>
        @foreach($degrees as $degree)
            @if($degree->departments->isEmpty())
            @else
                <h2> {{ $degree->degree_name }} </h2>
                @foreach($degree->departments as $department)
                    <li>{{ $department->department_name }}</li>
                @endforeach
            @endif
        @endforeach
    </div>
@endsection