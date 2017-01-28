@extends('admin.layouts.master')


@section('page_specific_styles')
    <link rel="stylesheet" href="{{ asset(config('neptrox.asset_path.admin.tree_css').'sweetalert.min.css') }}">

    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">--}}
    <link rel="stylesheet" href="{{ asset(config('neptrox.asset_path.admin.tree_css').'datatables.min.css') }}">

@endsection

@section('top-bar')

    @include($view_path.'.partials.top_nav')

@endsection


@section('content')

    <div class="page _mlr20">

        <div class="card">

            <div class="card-header bg-light">
                @include($view_path.'.partials._searchField_Action_button')
            </div>

            <div class="card-block">
                <div class="row">

                    {!! Form::open( ['method' => 'POST' , 'id' => 'pages_list'] ) !!}

                    @include($view_path . '.partials._pages_list')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
@section('page_specific_scripts')
    <script src="{{ asset(config('neptrox.asset_path.admin.vendor').'sweetalert.min.js') }}"></script>

    <script>
        var dataTableConfigVariable = {
            route_url: {
                dataTable_url: '{{route("admin.page.search")}}',
                enableAll: '{{route("admin.page.enableAll")}}',
                disableAll: '{{route("admin.page.disableAll")}}',
                delete: '{{route("admin.page.delete")}}'
            },
            columns: [
                {data: 'id', name: 'id', orderable: false, searchable: false},
                {data: 'title', name: 'title'},
                {data: 'slug', name: 'slug'},
                {data: 'description', name: 'description', orderable: false, searchable: false},
                {data: 'status', name: 'status', orderable: false, searchable: false},
            ],
            orderColumn: 1
        };
    </script>
    @include('admin.partials.list_page_script_datatables')


    <script>
        $('body').on('click','a.viewDesc', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            confirmDelete(url);
        })
    </script>

@endsection

