@props(['active' => false])

<a class="{{$active ? 'text-info' : 'text-light'}} nav-link"
    aria-current="{{$active ? 'page' : 'false'}}"
    {{$attributes}}
>
{{$slot}}
</a>