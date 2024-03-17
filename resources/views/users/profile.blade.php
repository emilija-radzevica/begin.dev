@extends('layout')
<link rel="stylesheet" href="{{ asset('css/profile.css')}}"> 
@section('css')
@endsection

@section('content')
<main>
    <div class="user-posts">
        @if (auth()->user()->admin)
        @unless ($users->isEmpty())
        @foreach ($users as $user )
            <div class="one-user-post">
                <div class="about">
                    <p class="post-title">{{$user->username}}</p>
                    <p class="summary">{{$user->name}}</p>
                    <p class="summary">{{$user->email}}</p>
                </div>
                <div class="action-btn">
                    <form action="/users/{{$user->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
        @else
            <p class="nopost">The Purge is done!</p>
        @endunless
        @else    
            @unless ($posts->isEmpty())
                    @foreach ($posts as $post )
                        <div class="one-user-post">
                            <div class="about">
                                <p class="post-title"><a href="/posts/{{$post->id}}">{{$post->name}}</a></p>
                                <p class="summary">{{$post->summary}}</p>
                            </div>
                            <div class="action-btn">
                                <a href="/posts/{{$post->id}}/edit">Edit</a>
                                <form action="/posts/{{$post->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button>Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <p class="nopost">You have no Posts</p>
            @endunless
        @endif
    
    </div>
    <div class="user-info">
        <h3>Your Info</h3>
        <div class="info">
            <div class="titles">
                <p>Name: </p>
                <p>Userame: </p>
                <p>E-mail: </p>
                <p>Status: </p>
            </div>
            <div class="data">
                <p>{{auth()->user()->name}}</p>
                <p>{{auth()->user()->username}}</p>
                <p>{{auth()->user()->email}}</p>
                @if (auth()->user()->admin)
                    <p>Admin</p>
                @else <p>Authorized User</p>
                @endif
            </div>
        </div>
    </div>
</main>




@endsection