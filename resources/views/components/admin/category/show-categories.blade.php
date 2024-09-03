<div class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>List of categories</caption>
        <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>setting</th>
        </tr>
        </thead>
        <tbody >
        @foreach($categories as $category)
        <tr>

            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td class="d-flex">
                <x-admin.ui.modify-button :css-class="'btn btn-sm btn-primary my-0 mx-1 text-white'"
                                          :url="route('category.edit',[$category])"
                                          :name="'Edit'"/>
                <x-admin.ui.delete-component>
                    <x-slot name="route">{{route('category.destroy',[$category])}}</x-slot>
                    <x-slot name="cssClass">btn btn-sm btn-danger my-0 mx-1 text-white ms-2</x-slot>
                </x-admin.ui.delete-component>
            </td>
        </tr>
        @endforeach
        </tbody>

    </table>
</div>
