@extends('layout')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-6">
            <h2><a href="?group=0">Все категории</a></h2>
            <ul class="list-group">
                @include('_shop', ['groups' => $groups])
            </ul>
        </div>
        <div class="col-lg-6">
            <h2>Все товары</h2>
            <ul class="list-group">
                @foreach($products as $product)
                    <li class="list-group-item">{{$product->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
