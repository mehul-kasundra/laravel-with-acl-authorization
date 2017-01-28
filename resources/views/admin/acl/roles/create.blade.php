@extends('admin.layouts.master')

@section('page_specific_styles')
    <!-- Select2 css -->
    @include('admin.partials._head_extra_select2_css')

    <!-- css for tree structure -->
    <link type="text/css" href="{{ asset(config('neptrox.asset_path.admin.css').'smartAdmin.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    @include('admin.partials.breadcrumb')


    <div class="card">
        {!! Form::open( ['route' => 'admin.roles.store', 'id' => 'form_edit_role'] ) !!}

        <div class="card-header">
            {{ trans($trans_path.'general.content.add') }}
        </div>

        @include($view_path.'.partials._role_form')


        <div class="card-footer">
            {!! Form::button( trans('general.button.create'), ['class' => 'btn btn-primary', 'id' => 'btn-submit-edit'] ) !!}
            <a href="{!! route('admin.roles.index') !!}" title="{{ trans('general.button.cancel') }}"
               class='btn btn-default'>{{ trans('general.button.cancel') }}</a>
        </div>

        {!! Form::close() !!}
    </div>

@endsection

@section('page_specific_scripts')
    <!-- extra script -->
    @include($view_path.'.partials.scripts')

    <!-- Select2 js -->
    @include($view_path.'.partials._body_bottom_select2_js_user_search')
    <!-- form submit -->
    @include($view_path.'.partials._body_bottom_submit_role_edit_form_js')
@endsection
