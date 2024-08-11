<x-admin.layout.master>
    <x-slot name="title">Banners Management</x-slot>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<x-admin.banner.title/>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <caption>List of banners</caption>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>url</th>
                        <th>image</th>
                        <th>setting</th>
                    </tr>
                </thead>
                <x-admin.banner.show-tables :banners="$banners"/>
            </table>
        </div>


</x-admin.layout>
