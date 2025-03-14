@props([
    'banners' => [],
])
<tbody>
@foreach ($banners as $banner)
    <tr>
        <td>{{ $banner->id }}</td>
        <td>{{ $banner->url }}</td>
        <td><img style="width: 80px;" src="{{ asset('banners/'.$banner->image) }}" alt=""></td>

        <td class="d-flex">
            <x-admin.ui.modify-button class="btn btn-sm btn-primary my-0 mx-1 text-white"
                                      url="{{route('banner.edit', $banner)}}"
                                      name="{{__('dashboard.edit')}}"/>

            <x-admin.ui.delete-component route="{{ route('banner.destroy',$banner) }}"/>
        </td>
    </tr>
@endforeach
</tbody>
