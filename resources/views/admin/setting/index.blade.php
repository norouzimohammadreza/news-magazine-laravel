<x-admin.layout.master>
    <x-slot name="title">Web Setting</x-slot>
    <x-admin.dashboard-title>
        <x-slot name="title">Website Setting</x-slot>
        <x-slot name="goto">{{route('setting.edit',[$setting])}}</x-slot>
        <x-slot name="create">set web setting</x-slot>
    </x-admin.dashboard-title>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>Website setting</caption>
            <thead>
            <tr>
                <th>name</th>
                <th>value</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>title</td>
                <td>{{$setting->title}}</td>
            </tr>
            <tr>
                <td>description</td>
                <td>{{$setting->description}}</td>
            </tr>
            <tr>
                <td>keyword</td>
                <td>{{$setting->keyword}}</td>
            </tr>
            <tr>
                <td>Logo</td>
                <td><img src="{{asset('setting/'.$setting->logo)}}" alt="" width="100px" height="100px"></td>
            </tr>
            <tr>
                <td>Icon</td>
                <td><img src="{{asset('setting/'.$setting->icon)}}" alt="" width="100px" height="100px"> </td>
            </tr>
            </tbody>
        </table>
    </section>


</x-admin.layout.master>
