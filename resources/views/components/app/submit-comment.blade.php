@props([
    'post'
])
<div class="comment-form">
    @if(session()->has('password'))
        <div class="mb-2 alert alert-success">
            <small class="form-text text-success">{{session('password')}}</small>
        </div>
    @endif
        @error('body')
        <div class="mb-2 alert alert-danger">
            <small class="form-text text-black">{{$message}}</small>
        </div>
        @enderror
    <h4>{{__('main.new_comment')}}</h4>
    <form method="POST" action="{{route('comment',$post)}}">
        @csrf
        <div class="form-group">
            <textarea class="form-control mb-10" rows="5" name="body" placeholder="{{__('main.text')}}"></textarea>
        </div>
        <input type="submit" class="primary-btn text-uppercase" value="{{__('auth_page.send')}}">
    </form>
</div>
