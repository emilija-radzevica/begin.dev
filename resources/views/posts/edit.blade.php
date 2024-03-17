@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/create.css')}}">   
@endsection

@section('content')
<main>
    <h2>Edit post: {{$postP->name}}</h2>
    <form action="/posts/{{$postP->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="short">
            <div class="basics">
                <h3>The Basics</h3>
                <div>
                    <label for="name">Post's title A.K.A the Name: </label>
                    <input type="text" name="name" value="{{$postP->name}}" class="input">
    
                    @error('name')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="aff">
                    <h4>Is it for...?</h4>
                    <div>
                        @if ($postP->affiliation==1)
                            <input type="radio" name="affiliation" id="" value=1 checked>
                            <label for="affiliation">Storytelling</label>
                            <input type="radio" name="affiliation" id="" value=2>
                            <label for="affiliation">Role Playing Game</label>
                        @else
                            <input type="radio" name="affiliation" id="" value=1>
                            <label for="affiliation">Storytelling</label>
                            <input type="radio" name="affiliation" id="" value=2 checked>
                            <label for="affiliation">Role Playing Game</label>
                        @endif

                        @error('affiliation')
                           <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                    
                </div>
                <div>
                    <label for="category">Category: </label>
                    @if ($postP->category==1)
                        <select name="category" id="category-input" value="{{$postP->category}}" onclick="show()">
                            <option value=1 selected>Character</option>
                            <option value=2>Location</option>
                            <option value=3>Item</option>
                            <option value=4>Culture</option>
                            <option value=5>Species</option>
                        </select>
                    @elseif ($postP->category==2)
                        <select name="category" id="" value="{{$postP->category}}">
                            <option value=1>Character</option>
                            <option value=2 selected>Location</option>
                            <option value=3>Item</option>
                            <option value=4>Culture</option>
                            <option value=5>Species</option>
                        </select>
                    @elseif ($postP->category==3)
                        <select name="category" id="" value="{{$postP->category}}">
                            <option value=1>Character</option>
                            <option value=2>Location</option>
                            <option value=3 selected>Item</option>
                            <option value=4>Culture</option>
                            <option value=5>Species</option>
                        </select>
                    @elseif ($postP->category==4)    
                        <select name="category" id="" value="{{$postP->category}}">
                            <option value=1>Character</option>
                            <option value=2>Location</option>
                            <option value=3>Item</option>
                            <option value=4 selected>Culture</option>
                            <option value=5>Species</option>
                        </select>
                    @else
                        <select name="category" id="" value="{{$postP->category}}">
                            <option value=1>Character</option>
                            <option value=2>Location</option>
                            <option value=3>Item</option>
                            <option value=4>Culture</option>
                            <option value=5 selected>Species</option>
                        </select>
                    @endif
    
                    @error('category')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="sum">
                    <label for="summary">The Summary:</label>
                    <textarea name="summary" id="" cols="60" rows="3">{{$postP->summary}}</textarea>
                    
                    @error('summary')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
        
                <div>
                    <label for="tags">Tags: </label>
                    <input type="text" name="tags" value="{{$postP->tags}}" placeholder="TagOne, TagTwo" class="input">
                    
                    @error('tags')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="image">This Image will help others visualize</label>
                    <input type="file" name="image" accept=".jpg, .png">
        
                    @error('image')
                        <p class="error">{{$message}}</p>
                    @enderror
                    @if ($postP->image)
                        <div class="edit-image">
                            <x-post-image :postImg="$postP"/> 
                        </div>
                    @endif    
                </div>
            </div>
    
            <div class="category-specific">
                <h3>Category specific details</h3>
                @if ($postP->category==1)
                    {{-- Character specific --}}
                <div id="age">
                    <label for="age">Age</label>
                    <input type="text" name="age" value="{{$oldC->age}}">
    
                    @error('age')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div id="class">
                    <label for="class">Class</label>
                    <input type="text" name="class" value="{{$oldC->class}}">
    
                    @error('class')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div id="subclass">
                    <label for="subclass">Subclass</label>
                    <input type="text" name="subclass" value="{{$oldC->subclass}}">
    
                    @error('subclass')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div id="species">
                    <label for="species">Species</label>
                    <input type="text" name="species" value="{{$oldC->species}}">
    
                    @error('species')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                @elseif($postP->category==2)
                    {{-- Location specific --}}
                <div id="climate">
                    <label for="climate">Climate</label>
                    <input type="text" name="climate" value="{{$oldL->climate}}">
    
                    @error('climate')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div id="location-owner">
                    <label for="owner">Owner</label>
                    <input type="text" name="owner" value="{{$oldL->owner}}">
    
                    @error('owner')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                @elseif ($postP->category==3) 
                    {{-- Item specific --}}
                    <div id="item-owner">
                        <label for="owner">Owner</label>
                        <input type="text" name="owner" value="{{$oldI->owner}}">
                    
                        @error('owner')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                @elseif ($postP->category==4)
                    {{-- Culture specific --}}
                    <div id="aspect">
                        <label for="aspect" class="edit-label">What aspect of culture?</label>
                        <input type="text" name="aspect" value="{{$oldCu->aspect}}" placeholder="Celebration? Food? Ritual?">
                    
                        @error('aspect')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                    <div id="culture-region">
                        <label for="region" class="edit-label">Where would such a culture exist?</label>
                        <input type="text" name="region" value="{{$oldCu->refion}}" placeholder="Example: King's Landing">
                    
                        @error('region')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                @else
                {{-- Species specific --}}
                <div id="species-region">
                    <label for="region" class="edit-label">Where would such a species exist?</label>
                    <input type="text" name="region" value="{{$oldS->region}}" placeholder="Example: King's Landing">
    
                    @error('region')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                @endif
            </div>
        </div>
        <div class="long">
            <h3>If you feel up to it-</h3>
                <div>
                    <label for="physicalDescription">Physical Description</label>
                    <textarea name="physicalDescription" id="" cols="60" rows="10">{{$postP->physicalDescription}}</textarea>
                    
                    @error('physicalDescription')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
            
                <div>
                    <label for="history">History</label>
                    <textarea name="history" id="" cols="60" rows="10">{{$postP->history}}</textarea>

                    @error('history')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
        </div>
        <div>
            <button type="submit" class="button">UPDATE IT</button>
        </div>
        
        
    </form>
</main>

@endsection