<tbody>
    @foreach ($banners as $banner)
    <tr>
        <td>{{ $banner->id }}</td>
        <td>{{ $banner->url }}</td>
        <td><img style="width: 80px;" src="{{ asset('banners/'.$banner->image) }}" alt=""></td>
        <td class="d-flex">
            <x-admin.ui.modify-button :css-class="'btn btn-sm btn-primary text-white my-0 mx-1'"
                                      :url="route('banner.edit', $banner)"
                                      :name="'Edit'"/>
            <x-admin.ui.delete-component>
                <x-slot name="route">{{ route('banner.destroy',$banner) }}</x-slot>
                <x-slot name="cssClass">btn btn-sm btn-danger my-0 mx-1 text-white ms-2</x-slot>
            </x-admin.ui.delete-component>
        </td>
    </tr>
    @endforeach
</tbody>
