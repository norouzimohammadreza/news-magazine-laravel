<section class="row my-3">
    <section class="col-12">
        <form method="post" action="{{route('category.store')}}">
            @csrf
            <x-admin.category.create.input/>
            <x-admin.ui.submit-button>
                <x-slot name="button">Store</x-slot>
            </x-admin.ui.submit-button>
        </form>
    </section>
</section>
