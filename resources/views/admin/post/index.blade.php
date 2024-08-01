@extends('admin.layout.master')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> Articles</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a role="button" href="" class="btn btn-sm btn-success">create</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of posts</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>summary</th>
                <th>view</th>
                <th>status</th>
                <th>Arthur</th>
                <th>category</th>
                <th>image</th>
                <th>setting</th>
            </tr>
            </thead>

            <tbody>


            <tr>
                <td>
                    <a class="text-primary" href="">
                          1
                    </a>
                </td>
                <td>
                    1
                <td>sfsaf</td>
                <td>
                        dfdasf
                </td>
                <td>
                    <span class="badge badge-success">#breaking_news</span>

                    <span class="badge badge-dark" >#editor_selected</span>

                </td>
                <td>
                        dfsasf
                </td>
                <td>
                        asffsa
                </td>
                <td><img style="width: 80px;" src="" alt=""></td>
                <td style="width: 25rem;">
                    <a role="button" class="btn btn-sm btn-warning btn-dark text-white" href="">

                    </a>
                    <a role="button" class="btn btn-sm btn-warning btn-dark text-white" href="">
                           asfasfasfas
                    </a>
                    <hr class="my-1" />
                    <a role="button" class="btn btn-sm btn-primary text-white" href="">edit</a>
                    <a role="button" class="btn btn-sm btn-danger text-white" href="">delete</a>
                </td>
            </tr>

            </tbody>

        </table>
    </div>
@endsection
