@props([
    'name',
    'url'
])
<a role="button" {{$attributes->merge(['class'=>'btn btn-sm text-white'])}} href="{{$url}}">
{{$name}}
</a>

