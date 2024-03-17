@props(['tagsCsv'])

@php
    $tagsSeperated = explode(',', $tagsCsv);
@endphp

<ul class="tags">
    @foreach ($tagsSeperated as $tag)
        <li class="tag">
            <a href="/?tag={{$tag}}">{{$tag}}</a>
        </li>
    @endforeach
</ul>