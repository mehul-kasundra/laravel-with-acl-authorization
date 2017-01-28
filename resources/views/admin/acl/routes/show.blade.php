@extends('admin.layouts.master')

@section('content')

    @include('admin.partials.breadcrumb')


    <div class='card'>
        <div class="card-header">
            {{ trans($trans_path.'general.content.show') }}
        </div>
        <div class="card-block">

            {!! Form::model($route, ['route' => 'admin.routes.index', 'method' => 'GET']) !!}

            <div class="form-group">
                {!! Form::label('method', trans($trans_path.'general.columns.method')) !!}
                {!! Form::text('method', null, ['class' => 'form-control', 'readonly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('path', trans($trans_path.'general.columns.path')) !!}
                {!! Form::text('path', null, ['class' => 'form-control', 'readonly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', trans($trans_path.'general.columns.name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'readonly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('action_name', trans($trans_path.'general.columns.action_name')) !!}
                {!! Form::text('action_name', null, ['class' => 'form-control', 'readonly']) !!}
            </div>
        </div><!-- /.card-block -->

        <div class="card-footer">
            {!! Form::submit(trans('general.button.close'), ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('admin.routes.edit', $route->id) !!}" title="{{ trans('general.button.edit') }}"
               class='btn btn-default'>{{ trans('general.button.edit') }}</a>
        </div>

        {!! Form::close() !!}

    </div><!-- /.card -->

@endsection
