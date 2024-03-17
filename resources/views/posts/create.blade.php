@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/create.css')}}">   
@endsection

@section('content')
<main>
    <h2>Yay! You want to contribute!</h2>
    <form action="/posts" method="post" enctype="multipart/form-data">
        @csrf
        <div class="short">
            <div class="basics">
                <h3>The Basics</h3>
                <div>
                    <label for="name">Post's title A.K.A the Name: </label>
                    <input type="text" name="name" value="{{old('name')}}" class="input">
    
                    @error('name')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="aff">
                    <h4>Is it for...?</h4>
                    <div>
                        <input type="radio" name="affiliation" id="" value=1>
                        <label for="affiliation">Storytelling</label>
                    
                        <input type="radio" name="affiliation" id="" value=2>
                        <label for="affiliation">Role Playing Game</label>    
                    </div>
                    @error('affiliation')
                        <p class="error">{{$message}}</p>
                    @enderror
                    
                </div>
                <div>
                    <label for="category">Category: </label>
                    <select name="category" id="category-input" class="category-input" onchange="show()">
                        <option disabled selected value> -- select an option -- </option>
                        <option value=1>Character</option>
                        <option value=2>Location</option>
                        <option value=3>Item</option>
                        <option value=4>Culture</option>
                        <option value=5>Species</option>
                    </select>
    
                    @error('category')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="uni">
                    <label for="universe" class="universe">Universe, Fandom or Campaign: </label>
                    <input type="text" name="universe" value="{{old('universe')}}" placeholder="Example: Harry Potter" class="input">
                    
                    @error('tags')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="sum">
                    <label for="summary">The Summary:</label>
                    <textarea name="summary" id="" cols="60" rows="3">{{old('summary')}}</textarea>
                    
                    @error('summary')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
        
                <div>
                    <label for="tags">Tags: </label>
                    <input type="text" name="tags" value="{{old('tags')}}" placeholder="TagOne, TagTwo" class="input">
                    
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
                </div>
            </div>
    
            <div class="category-specific">
                <h3>Category specific details</h3>
                {{-- Character specific --}}
                <div id="age">
                    <label for="age">Age</label>
                    <input type="text" name="age" value="{{old('age')}}">
    
                    @error('age')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div id="class">
                    <label for="class">Class</label>
                    <input type="text" name="class" value="{{old('class')}}">
    
                    @error('class')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div id="subclass">
                    <label for="subclass">Subclass</label>
                    <input type="text" name="subclass" value="{{old('subclass')}}">
    
                    @error('subclass')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div id="species">
                    <label for="species">Species</label>
                    <input type="text" name="species" value="{{old('species')}}">
    
                    @error('species')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
    
                {{-- Location specific --}}
                <div id="climate">
                    <label for="climate">Climate</label>
                    <input type="text" name="climate" value="{{old('climate')}}">
    
                    @error('climate')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
    
                {{-- Item specific --}}
                <div id="owner">
                    <label for="owner">Owner</label>
                    <input type="text" name="owner" value="{{old('owner')}}">
    
                    @error('owner')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                {{-- Culture specific --}}
                <div id="aspect">
                    <label for="aspect" class="edit-label">What aspect of culture?</label>
                    <input type="text" name="aspect" value="{{old('aspect')}}" placeholder="Celebration? Food? Ritual?">
    
                    @error('aspect')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div id="culture-region">
                    <label for="region" class="edit-label">Where would such a culture exist?</label>
                    <input type="text" name="region" value="{{old('region')}}" placeholder="Example: King's Landing">
    
                    @error('region')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
                {{-- Species specific --}}
                <div id="species-region">
                    <label for="region" class="edit-label">Where would such a species exist?</label>
                    <input type="text" name="region" value="{{old('region')}}" placeholder="Example: King's Landing">
    
                    @error('region')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="long">
            <h3>If you feel up to it-</h3>
                <div>
                    <label for="physicalDescription">Physical Description</label>
                    <textarea name="physicalDescription" id="" cols="60" rows="10">{{old('physicalDescription')}}</textarea>
                    
                    @error('physicalDescription')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
            
                <div>
                    <label for="history">History</label>
                    <textarea name="history" id="" cols="60" rows="10">{{old('history')}}</textarea>

                    @error('history')
                        <p class="error">{{$message}}</p>
                    @enderror
                </div>
        </div>
        <div>
            <button type="submit" class="button">POST IT</button>
        </div>
       
    </form>
</main>
@endsection