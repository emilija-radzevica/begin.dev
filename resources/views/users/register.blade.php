@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css')}}">   
@endsection

@section('content')
<main>
    <div class="background-register">
        <form action="/users" method="post">
            @csrf
            <h3>Sign up</h3>
            <input type="text" name="name" id="" placeholder="Name Surname" value="{{old('name')}}">
            @error('name')
                <p class="error">{{$message}}</p>
            @enderror
            <input type="text" name="username" id="" placeholder="username" value="{{old('username')}}">
            @error('username')
                <p class="error">{{$message}}</p>
            @enderror
            <input type="email" name="email" id="" placeholder="email@email.com" value="{{old('email')}}">
            @error('email')
                <p class="error">{{$message}}</p>
            @enderror
            <input type="password" name="password" id="" placeholder="password">
            @error('password')
                <p class="error">{{$message}}</p>
            @enderror
            <input type="password" name="password_confirmation" id="" placeholder="Confirm password">
            @error('password_confirmation')
                <p class="error">{{$message}}</p>
            @enderror
            <button>Sign up</button>
        </form>
        <div class="link">
            <p>Already a resgistered user?</p>
            <a href="/login">Log in</a>
        </div>
    </div>



</main>
@endsection
