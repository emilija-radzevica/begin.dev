@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">   
@endsection
@section('content')
<main>
    <section class="catalogue-container">
        <div class="catalogue">
            @unless (count($uno) == 0)
            @foreach($uno as $post)
                <x-post-card :something="$post" :authors="$authors"/>
            @endforeach
            @else
                <p class="nopost">No Posts found</p>
            @endunless
        </div>
        <div class="pagination">
            {{$uno->links()}}
        </div>
    </section>
    <section class="filter">
        <form action="/" method="get">
            <div>
                <h5>Search by keywords</h5>
                <input type="text" name="search" class="search" >
            </div>
            <div class="radio">
                <h5>Affiliation</h5>
                <input type="radio" id="" name="affiliation" value=1>
                <label for="affiliation"> Storytelling</label><br>
                <input type="radio" id="" name="affiliation" value=2>
                <label for="affiliation"> Role Playing Games</label><br>
            </div>

            <div>
                <h5>Category</h5>
                <select name="category" class="select">
                    <option disabled selected value> -- select an option -- </option>
                    <option value=1>Character</option>
                    <option value=2>Location</option>
                    <option value=3>Item</option>
                    <option value=4>Culture</option>
                    <option value=5>Species</option>
                  </select>
            </div>
            <button type="submit" class="search-btn">Search</button>
            
        </form>
    </section>
</main>
@endsection