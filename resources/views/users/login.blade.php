@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css')}}">   
@endsection

@section('content')
<main>
    <div class="background-register">
        <form action="/users/authenticate" method="post">
            @csrf
            <h3>Log in</h3>
            <input type="text" name="username" id="" placeholder="username" value="{{old('username')}}">
            @error('username')
                <p class="error">{{$message}}</p>
            @enderror
            <input type="password" name="password" id="" placeholder="password">
            @error('password')
                <p class="error">{{$message}}</p>
            @enderror
            <button>Log in</button>
        </form>
        <div class="link">
            <p>Not yet a resgistered user?</p>
            <a href="/register">Sign up</a>
        </div>
    </div>
</main>
@endsection
