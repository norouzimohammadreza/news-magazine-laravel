@props([
    'category'
])

<section class="row my-3">
    <section class="col-12">
        <form method="post" action="{{route('category.update',[$category])}}">
            @csrf
            @method('PUT')
            <x-admin.category.edit.input :category="$category"/>
            <x-admin.ui.submit-button>
                <x-slot name="button">{{__('dashboard.update')}}</x-slot>
            </x-admin.ui.submit-button>
        </form>
    </section>
</section>
