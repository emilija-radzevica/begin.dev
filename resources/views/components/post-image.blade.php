@props(['postImg'])

@if ($postImg->category==1)
    <img src="{{$postImg->image ? asset('storage/' . $postImg->image) : asset('images/character.png')}}" alt="character icon">
@elseif ($postImg->category==2)
    <img src="{{$postImg->image ? asset('storage/' . $postImg->image) : asset('images/location.png')}}" alt="location icon">
@elseif ($postImg->category==3)
    <img src="{{$postImg->image ? asset('storage/' . $postImg->image) : asset('images/item.png')}}" alt="item icon">
@elseif ($postImg->category==4)
    <img src="{{$postImg->image ? asset('storage/' . $postImg->image) : asset('images/culture.png')}}" alt="culture icon">
@else 
    <img src="{{$postImg->image ? asset('storage/' . $postImg->image) : asset('images/species.png')}}" alt="species icon">
@endif 