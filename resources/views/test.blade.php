@extends('layout')
@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Start</th>
                <th>End</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tests as $test)
            <tr>
                <td>{{$test->script_name}}</td>
                <td>{{$test->start_time}}</td>
                <td>{{$test->end_time}}</td>
                <td>{{$test->result}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
