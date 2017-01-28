@extends('admin.layouts.master')

@section('page_specific_styles')
    <!-- Select2 css -->
    @include('admin.partials._head_extra_select2_css')

@endsection

@section('content')

    @include('admin.partials.breadcrumb')

    <div class='card'>

        {!! Form::model($role, ['route' => 'admin.roles.index', 'method' => 'GET']) !!}
        <div class="card-header">
            {{ trans($trans_path.'general.content.show') }}
        </div>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#tab_details"
                   data-toggle="tab">{!! trans('general.tabs.details') !!}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab_options" data-toggle="tab">{!! trans('general.tabs.options') !!}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab_perms" data-toggle="tab">{!! trans('general.tabs.perms') !!}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab_users" data-toggle="tab">{!! trans('general.tabs.users') !!}</a>
            </li>
        </ul>
        <div class="card-block tab-content">
            <div class="tab-pane active" id="tab_details">
                <div class="form-group">
                    {!! Form::label('name', trans($trans_path. 'general.columns.name')) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'readonly']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('display_name', trans($trans_path. 'general.columns.display_name')) !!}
                    {!! Form::text('display_name', null, ['class' => 'form-control', 'readonly']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', trans($trans_path. 'general.columns.description')) !!}
                    {!! Form::text('description', null, ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="tab_options">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('resync_on_login', '1', $role->resync_on_login, ['disabled']) !!} {!! trans($trans_path. 'general.columns.resync_on_login') !!}
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('enabled', '1', $role->enabled, ['disabled']) !!} {!! trans('general.status.enabled') !!}
                        </label>
                    </div>
                </div>
            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="tab_perms">
                <div class="form-group">
                    <div class="col-4">
                        @foreach($perms as $perm)
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('perms[]', $perm->id, $role->hasPerm($perm), ['disabled']) !!} {{ $perm->display_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="tab_users">
                <div class="form-group">
                    <div class="input-group select2-bootstrap-append">
                        {!! Form::select('user_search', [], null, ['class' => 'form-control', 'id' => 'user_search', 'disabled' => 'disabled',  'style' => "width: 100%"]) !!}
                        <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" disabled>
                                            <span class="fa fa-plus-square"></span>
                                        </button>
                                    </span>
                    </div>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>{!! trans($trans_path. 'general.columns.name')  !!}</th>
                                <th>{!! trans($trans_path. 'general.columns.username')  !!}</th>
                                <th>{!! trans($trans_path. 'general.columns.enabled')  !!}</th>
                                <th style="text-align: right">{!! trans($trans_path. 'general.columns.actions')  !!}</th>
                            </tr>
                            @foreach($role->users as $user)
                                <tr>
                                    <td>{!! link_to_route('admin.users.show', $user->full_name, [$user->id], []) !!}</td>
                                    <td>{!! link_to_route('admin.users.show', $user->username, [$user->id], []) !!}</td>
                                    <td>
                                        @if($user->enabled)
                                            <i class="fa fa-check text-green"></i>
                                        @else
                                            <i class="fa fa-close text-red"></i>
                                        @endif
                                    </td>
                                    <td style="text-align: right">
                                        <i class="fa fa-trash-o text-muted"></i>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /.form-group -->
            </div><!-- /.tab-pane -->

        </div><!-- /.card-block.tab-content -->

        <div class="card-footer">
            {!! Form::submit(trans('general.button.close'), ['class' => 'btn btn-primary']) !!}
            @if ( $role->isEditable() || $role->canChangePermissions() )
                <a href="{!! route('admin.roles.edit', $role->id) !!}"
                   title="{{ trans('general.button.edit') }}"
                   class='btn btn-default'>{{ trans('general.button.edit') }}</a>
            @endif
        </div>

        {!! Form::close() !!}

    </div><!-- /.card -->
@endsection

@section('page_specific_scripts')
    <!-- Select2 js -->
    @include($view_path.'.partials._body_bottom_select2_js_user_search')
@endsection
