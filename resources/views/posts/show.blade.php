@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/show.css')}}">
@endsection

@section('content')

<main>
    <h2>{{$theseVariablesMatch->name}}</h2>
    <p class="author">{{$author->username}}</p>
    <div class="info-container">
        <div class="img-container">
            <x-post-image :postImg="$theseVariablesMatch"/>
        </div>
        <div class="post-info">
            <div class="extra">
                <div class="post-details">
                    <div class="detail-title">
                        <h4>Affiliation or Intended Use: </h4>
                        <h4>Category of the Post: </h4>
                    </div>
                    <div class="detail-info">
                        @if ($theseVariablesMatch->affiliation==1)
                            <p>Storytelling</p>
                        @else 
                            <p>Role Playing Games</p>
                        @endif
                        @if ($theseVariablesMatch->category==1)
                            <p>Character</p>
                        @elseif ($theseVariablesMatch->category==2) 
                            <p>Location</p>
                        @elseif ($theseVariablesMatch->category==3) 
                            <p>Item</p>
                        @elseif ($theseVariablesMatch->category==4) 
                            <p>Species</p>
                        @else 
                            <p>Culture</p>
                        @endif 
                    </div> 
                </div>
                <div class="middle">
                    <div class="post-details">
                        <div class="detail-title">
                            <h4>Used Tags or Keywords: </h4>
                        </div>
                        <div class="detail-info">
                            <x-post-tags :tagsCsv="$theseVariablesMatch->tags" />
                        </div>
                    </div>
                </div>
                
                <div class="post-details">
                    @if ($theseVariablesMatch->category==1)
                    <div class="detail-title">
                        <h4>Universe, Fandom or Campaign: </h4>
                        @if ($chInfo->age)
                            <h4>Age: </h4>
                        @endif
                        @if ($chInfo->species)
                            <h4>Species: </h4>
                        @endif
                        @if ($theseVariablesMatch->affiliation==2)
                            @if ($chInfo->class)
                                <h4>Class: </h4>
                            @endif
                            @if ($chInfo->subclass)
                                <h4>Subclass: </h4>
                            @endif 
                        @endif  
                    </div>
                    <div class="detail-info">
                        <p>{{$theseVariablesMatch->universe}}</p>
                        @if ($chInfo->age)
                            <p>{{$chInfo->age}}</p>
                        @endif
                        @if ($chInfo->species)
                            <p>{{$chInfo->species}}</p>
                        @endif
                        @if ($theseVariablesMatch->affiliation==2)
                            @if ($chInfo->class)
                                <p>{{$chInfo->class}}</p>
                            @endif
                            @if ($chInfo->subclass)
                                <p>{{$chInfo->subclass}}</p>
                            @endif
                        @endif   
                    </div>
                    @elseif ($theseVariablesMatch->category==2)
                    <div class="detail-title">
                        <h4>Universe, Fandom or Campaign: </h4>
                        @if ($lInfo->climate)
                            <h4>Climate: </h4>
                        @endif
                        @if ($lInfo->owner)
                            <h4>Owner: </h4>
                        @endif 
                    </div>
                    <div class="detail-info">
                        <p>{{$theseVariablesMatch->universe}}</p>
                        @if ($lInfo->climate)
                            <p>{{$lInfo->climate}}</p>
                        @endif
                        @if ($lInfo->owner)
                            <p>{{$lInfo->owner}}</p>
                        @endif 
                    </div>
                    @elseif ($theseVariablesMatch->category==3)
                    <div class="detail-title">
                        <h4>Universe, Fandom or Campaign: </h4>
                        @if ($iInfo->owner)
                            <h4>Owner: </h4>
                        @endif
                    </div>
                    <div class="detail-info">
                        <p>{{$theseVariablesMatch->universe}}</p>
                        @if ($iInfo->owner)
                            <p>{{$iInfo->owner}}</p>
                        @endif
                    </div>
                    @elseif ($theseVariablesMatch->category==4)
                    <div class="detail-title">
                        <h4>Universe, Fandom or Campaign: </h4>
                        @if ($cuInfo->aspect)
                            <h4>Aspect: </h4>
                        @endif
                        @if ($cuInfo->region)
                            <h4>Region: </h4>
                        @endif
                    </div>
                    <div class="detail-info">
                        <p>{{$theseVariablesMatch->universe}}</p>
                        @if ($cuInfo->aspect)
                            <p>{{$cuInfo->aspect}}</p>
                        @endif
                        @if ($cuInfo->region)
                            <p>{{$cuInfo->region}}</p>
                        @endif
                    </div>
                    @else 
                    <div class="detail-title">
                        <h4>Universe, Fandom or Campaign: </h4>
                        @if ($sInfo->region)
                            <h4>Region: </h4>
                        @endif 
                    </div>
                    <div class="detail-info">
                        <p>{{$theseVariablesMatch->universe}}</p>
                        @if ($sInfo->region)
                            <p>{{$sInfo->region}}</p>
                        @endif  
                    </div>
                    @endif
                    {{-- <div class="detail-title">
                        <h4>Universe, Fandom or Campaign: </h4>
                        @if ($chInfo)
                            
                        @endif
                        <h4>Age: </h4>
                        <h4>Species: </h4>
                        @if($theseVariablesMatch->affiliation==2)
                        <h4>Class: </h4>
                        <h4>Subclass: </h4>
                        @endif
                    </div>
                    <div class="detail-info">
                        <p>{{$theseVariablesMatch->universe}}</p>
                        <p>{{$chInfo->age}}</p>
                        <p>{{$chInfo->species}}</p>
                        @if($theseVariablesMatch->affiliation==2)
                        <p>{{$chInfo->class}}</p>
                        <p>{{$chInfo->subclass}}</p>
                        @endif
                    </div> --}}
                </div>
            </div>
            <div class="description">
                <h4>Physical Description: </h4>
                <p>{{$theseVariablesMatch->physicalDescription}}</p>
            </div>
            <div class="history">
                <h4>History: </h4>
                <p>{{$theseVariablesMatch->history}}</p>
            </div>
        </div>
    </div>
    @auth
        @if (auth()->user()->admin)
        <div class="admin-btn">
            <a href="/posts/{{$theseVariablesMatch->id}}/edit" class="show-edit">EDIT</a>
            <form action="/posts/{{$theseVariablesMatch->id}}" method="post">
                @csrf
                @method('DELETE')
                <button class="show-delete">DELETE</button>
            </form>
        </div>
        @endif
    @endauth
</main>

@endsection