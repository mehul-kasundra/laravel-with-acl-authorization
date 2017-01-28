@extends('admin.layouts.master')

@section('page_specific_styles')
    <!-- bootstrap switch css -->
    <link rel="stylesheet" href="{{ asset(config('neptrox.asset_path.admin.css').'bootstrap_switch.css') }}">

@endsection

@section('top-bar')

    @include($view_path.'.partials.top_nav')

@endsection

@section('page_specific_scripts')

    <!-- bootstrap switch -->
    <script src="{{ asset(config('neptrox.asset_path.admin.js').'bootstrap_switch.js') }}"></script>
    <script>
        //for bootstrap switch initialize
        $("input[name='status']").bootstrapSwitch({
            onText: 'Yes',
            offText: 'No'
        });

        //for form submit
        $('.saveCloseButton').click(function (event) {
            $('form#configure_add_edit').submit();
        });
    </script>

@endsection

@section('content')

    <div class="configure-add-form _mlr20">
        <div class="card m-b-0">
            <div class="row">

                {!! Form::open( ['route' => ['admin.configuration.update', $configure['id']], 'method' => 'POST', 'id' => 'configure_add_edit'] ) !!}

                <input type="hidden" name="id" value="{{ $configure['id'] }}">

                @include($view_path.'.partials._configure_form')
                @include($view_path.'.partials._form_right_side')

                {!! Form::close() !!}

            </div>
        </div>

    </div>

@endsection