@extends('admin.layouts.master')

@section('page_specific_styles')
    <!-- Select2 css -->
    @include('admin.partials._head_extra_select2_css')
@endsection

@section('content')

    @include('admin.partials.breadcrumb')


    <div class="card">
        {!! Form::open( ['route' => 'admin.permissions.store', 'id' => 'form_edit_permission'] ) !!}

        <div class="card-header">
            {{ trans($trans_path.'general.content.add') }}
        </div>

        @include($view_path.'.partials._permission_form')

        <div class="card-footer">
            {!! Form::button( trans('general.button.create'), ['class' => 'btn btn-primary', 'id' => 'btn-submit-edit'] ) !!}
            <a href="{!! route('admin.permissions.index') !!}" title="{{ trans('general.button.cancel') }}"
               class='btn btn-default'>{{ trans('general.button.cancel') }}</a>
        </div>

        {!! Form::close() !!}
    </div>

@endsection

@section('page_specific_scripts')
    {{--<!-- Select2 js -->--}}
    @include($view_path.'.partials._body_bottom_select2_js_route_search')
    @include($view_path.'.partials._body_bottom_select2_js_role_search')

    <!-- form submit -->
    @include($view_path.'.partials._body_bottom_submit_permission_edit_form_js')
@endsection
