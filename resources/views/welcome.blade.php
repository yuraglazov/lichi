@extends('layout')
@section('content')
    <div class="container">
        <ul class="list-group mt-5">
            <li class="list-group-item"><a href="{{route('fibonacci')}}">Задание 1</a></li>
            <li class="list-group-item"><a href="{{route('range')}}">Задание 2</a></li>
            <li class="list-group-item"><a href="{{route('get')}}">Задание 3</a></li>
            <li class="list-group-item"><a href="{{route('shop')}}">Задание 4</a></li>
            <li class="list-group-item"><a href="{{route('form')}}">Задание 5</a></li>
        </ul>
    </div>
@endsection
