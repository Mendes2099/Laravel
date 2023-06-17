@extends('layouts.layout')

@section('title')
    <title>Login</title>
@endsection

@section('content')
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                @error('email')
                    <div id="emailHelp" class="form-text">Insira um email válido.</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">

                @error('password')
                    <div id="passwordHelp" class="form-text">Insira uma password.</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
@endsection


