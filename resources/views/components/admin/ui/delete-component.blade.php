@props([
    'route'
])
<form action="{{$route}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-sm btn-danger my-0 mx-1 text-white ms-2" data-confirm-delete="true">{{__('dashboard.delete')}}</button>
</form>
