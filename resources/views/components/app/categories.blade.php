@props([
    'categories'
])
@foreach($categories as $category)
    <li class="menu-active">
        <a href="{{route('category',$category)}}">{{$category->title}} </a>
    </li>
@endforeach
