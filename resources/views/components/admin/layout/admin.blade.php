<x-admin.layout.css-loader/>
<x-layouts.master>
<x-admin.layout.header/>
<div class="container-fluid">
    <div class="row">
        <x-admin.layout.sidebar/>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            {{$slot}}
        </main>
    </div>
</div>
<x-admin.layout.scripts/>
@stack('ckEditorJs')
</x-layouts.master>
