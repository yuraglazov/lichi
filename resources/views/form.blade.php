@extends('layout')
@section('content')
<div class="container">
    <div id="status">
        <div class="alert " role="alert"></div>
    </div>
    <form action="ajax-request" method="post" id="form">
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Ivan" required>
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия</label>
            <input type="text" class="form-control" name="surname" id="surname" placeholder="Petrov" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="ivan@site.com" required>
        </div>
        <div class="mb-3">
            <label for="inputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password" id="inputPassword1" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <label for="inputPassword2" class="form-label">Повторите пароль</label>
            <input type="password" class="form-control" name="repeat_password" id="inputPassword2" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">Отправить</button>
        </div>
    </form>
</div>
@endsection
