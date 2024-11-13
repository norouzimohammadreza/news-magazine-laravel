<x-admin.layout.admin>

    <x-slot name="title">{{__('setting.setting')}}</x-slot>

    <x-admin.dashboard-title>
        <x-slot name="title">{{__('setting.website')}}</x-slot>
        <x-slot name="goto">{{route('setting.edit',[$setting])}}</x-slot>
        <x-slot name="create">{{__('setting.Set_web_setting')}}</x-slot>
    </x-admin.dashboard-title>

    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>{{__('setting.website')}}</caption>

            <thead>
            <tr>
                <th>{{__('validation.attributes.name')}}</th>
                <th>{{__('setting.value')}}</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>{{__('validation.attributes.title')}}</td>
                <td>{{$setting->title}}</td>
            </tr>
            <tr>
                <td>{{__('validation.attributes.description')}}</td>
                <td>{{$setting->description}}</td>
            </tr>
            <tr>
                <td>{{__('validation.attributes.keyword')}}</td>
                <td>{{$setting->keyword}}</td>
            </tr>
            <tr>
                <td>{{__('validation.attributes.logo')}}</td>
                <td><img src="{{asset('setting/'.$setting->logo)}}" alt="" width="100px" height="100px"></td>
            </tr>
            <tr>
                <td>{{__('validation.attributes.icon')}}</td>
                <td><img src="{{asset('setting/'.$setting->icon)}}" alt="" width="100px" height="100px"></td>
            </tr>
            </tbody>

        </table>
    </section>


</x-admin.layout.admin>
