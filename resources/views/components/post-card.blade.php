@props(['something', 'authors'])

<div class="card-container">
    <div class="post-container">
        <a href="posts/{{$something['id']}}">
            <x-post-image :postImg="$something"/>
            <div class="post-info">
                <h3>{{$something['name']}}</h3>
                <p class="post-summary">{{$something->summary}}</p>
                <x-post-tags :tagsCsv="$something->tags" />
                    
                    @foreach ($authors as $author)
                        @if ($author->id==$something->user_id)
                            <p class="post-author"><strong>{{$author->username}}</strong></p>
                        @endif
                    @endforeach
            </div>
        </a>
    </div>
    <img class="paperclip" src="{{asset('images/paperclip.png')}}" alt="paperclip">

    @if ($something->affiliation==1)
        <div class="tab" style="background-color: rgba(87, 61, 107, 0.9)">
            @if ($something->category==1)
                <img src="{{asset('images/character.png')}}" alt="character icon">
            @elseif ($something->category==2)
                <img src="{{asset('images/location.png')}}" alt="location icon">
            @elseif ($something->category==3)
                <img src="{{asset('images/item.png')}}" alt="item icon">
            @elseif ($something->category==4)
                <img src="{{asset('images/culture.png')}}" alt="culture icon">
            @else <img src="{{asset('images/species.png')}}" alt="species icon">
            @endif 
        </div>
    @else 
        <div class="tab" style="background-color: rgba(61, 107, 83, 0.9)">
            @if ($something->category==1)
                <img src="{{asset('images/character.png')}}" alt="character icon">
            @elseif ($something->category==2)
                <img src="{{asset('images/location.png')}}" alt="character icon">
            @elseif ($something->category==3)
                <img src="{{asset('images/item.png')}}" alt="character icon">
            @elseif ($something->category==4)
                <img src="{{asset('images/culture.png')}}" alt="character icon">
            @else <img src="{{asset('images/species.png')}}" alt="character icon">
            @endif 
        </div>
    @endif
    
</div>
