<div class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>{{__('category.list_of_categories')}}</caption>
        <thead>
        <tr>
            <th>#</th>
            <th>{{__('category.name')}}</th>
            <th>{{__('dashboard.setting')}}</th>
        </tr>
        </thead>
        <tbody >
        @foreach($categories as $category)
        <tr>

            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td class="d-flex">
                <x-admin.ui.modify-button class="btn btn-sm btn-primary my-0 mx-1 text-white"
                                          url="{{route('category.edit',[$category])}}"
                                          name="{{__('dashboard.edit')}}"/>
                <x-admin.ui.delete-component>
                    <x-slot name="route">{{route('category.destroy',[$category])}}</x-slot>
                </x-admin.ui.delete-component>
            </td>
        </tr>
        @endforeach
        </tbody>

    </table>
    {{$categories->links()}}
</div>
