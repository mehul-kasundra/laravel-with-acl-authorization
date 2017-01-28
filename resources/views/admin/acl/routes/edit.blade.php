@extends('admin.layouts.master')

@section('content')

    @include('admin.partials.breadcrumb')

    <div class="card">
        {!! Form::model( $route, ['route' => ['admin.routes.update', $route->id], 'method' => 'POST'] ) !!}
        <div class="card-header">
            {{ trans($trans_path.'general.content.update') }}
        </div>
        <div class="card-block">
            @include($view_path.'.partials._route_form')
        </div>
        <div class="card-footer">
            {!! Form::submit( trans('general.button.update'), ['class' => 'btn btn-primary'] ) !!}
            <a href="{!! route('admin.routes.index') !!}" title="{{ trans('general.button.cancel') }}" class='btn btn-default'>{{ trans('general.button.cancel') }}</a>
        </div>
    </div>
    {!! Form::close() !!}

@endsection

