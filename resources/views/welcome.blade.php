@extends('layout')
@section('content')
    <ul class="container">
        <li><a href="{{route('fibonacci')}}">Задание 1</a></li>
        <li><a href="{{route('range')}}">Задание 2</a></li>
    </ul>
@endsection
