@extends('admin.layouts.master')

@section('page_specific_styles')
    <!-- bootstrap switch css -->
    <link rel="stylesheet" href="{{ asset(config('neptrox.asset_path.admin.css').'bootstrap_switch.css') }}">

@endsection

@section('page_specific_scripts')
    <!-- bootstrap switch -->
    <script src="{{ asset(config('neptrox.asset_path.admin.js').'bootstrap_switch.js') }}"></script>
    <script>
        $("input[name='status']").bootstrapSwitch({
            onText: 'Yes',
            offText: 'No'
        });
    </script>


    <script>
        $('.saveCloseButton').click(function (event) {
            checkSlugInServer();
            if (submitFormEnable){
                $('form#form_add_edit_page').submit();
            }
        });
    </script>

@endsection

@section('top-bar')

    @include($view_path.'.partials.top_nav')

@endsection

@section('content')


    <div class="pages-add-form _mlr20">
        <div class="card m-b-0">
            <div class="row">

                {!! Form::open(['route' => $base_route.'.store', 'id' => 'form_add_edit_page', 'class' => 'smart-form', 'novalidate']) !!}

                @include($view_path.'.partials._page_form')
                @include($view_path.'.partials._form_right_side')

                {!! Form::close() !!}

            </div>
        </div>

    </div>

@endsection
