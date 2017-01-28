@extends('admin.layouts.master')

@section('page_specific_styles')
    <!-- Select2 css -->
    @include('admin.partials._head_extra_select2_css')
@endsection


@section('content')

    @include('admin.partials.breadcrumb')


    <div class='card'>

        {!! Form::model($user, ['route' => 'admin.users.index', 'method' => 'GET']) !!}
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
                <a class="nav-link" href="#tab_roles" data-toggle="tab">{!! trans('general.tabs.roles') !!}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab_perms" data-toggle="tab">{!! trans('general.tabs.perms') !!}</a>
            </li>

        </ul>
        <div class="card-block tab-content">
            <div class="tab-pane active" id="tab_details">
                <div class="form-group">
                    {!! Form::label('first_name', trans($trans_path.'general.columns.first_name')) !!}
                    {!! Form::text('first_name', null, ['class' => 'form-control', 'readonly']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('last_name', trans($trans_path.'general.columns.last_name')) !!}
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'readonly']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('username', trans($trans_path.'general.columns.username')) !!}
                    {!! Form::text('username', null, ['class' => 'form-control', 'readonly']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', trans($trans_path.'general.columns.email')) !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'readonly']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', trans($trans_path.'general.columns.password')) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'readonly']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', trans($trans_path.'general.columns.password_confirmation')) !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="tab_options">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('enabled', '1', $user->enabled, ['disabled']) !!} {!! trans('general.status.enabled') !!}
                        </label>
                    </div>
                </div>
            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="tab_roles">
                <div class="form-group">
                    <div class="input-group select2-bootstrap-append">
                        {!! Form::select('role_search', [], null, ['class' => 'form-control', 'id' => 'role_search', 'disabled' => 'disabled',  'style' => "width: 100%"]) !!}
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
                                <th>{!! trans($trans_path.'general.columns.name')  !!}</th>
                                <th>{!! trans($trans_path.'general.columns.description')  !!}</th>
                                <th>{!! trans($trans_path.'general.columns.enabled')  !!}</th>
                                <th style="text-align: right">{!! trans($trans_path.'general.columns.actions')  !!}</th>
                            </tr>
                            @foreach($user->roles as $role)
                                <tr>
                                    <td>{!! link_to_route('admin.roles.show', $role->display_name, [$role->id], []) !!}</td>
                                    <td>{!! link_to_route('admin.roles.show', $role->description, [$role->id], []) !!}</td>
                                    <td>
                                        @if($role->enabled)
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

            <div class="tab-pane" id="tab_perms">
                <div class="form-group">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>{!! trans($trans_path.'general.columns.name')  !!}</th>
                                <th>{!! trans($trans_path.'general.columns.effective')  !!}</th>
                            </tr>
                            @foreach($perms as $perm)
                                <tr>
                                    <td>{!! link_to_route('admin.permissions.show', $perm->display_name, [$perm->id], []) !!}</td>
                                    <td>
                                        @if($user->can($perm->name))
                                            <i class="fa fa-check text-green"></i>
                                        @else
                                            <i class="fa fa-close text-red"></i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.tab-pane -->

        </div><!-- /.card-block.tab-content -->

        <div class="card-footer">
            {!! Form::submit(trans('general.button.close'), ['class' => 'btn btn-primary']) !!}
            @if ($user->isEditable())
                <a href="{!! route('admin.users.edit', $user->id) !!}"
                   title="{{ trans('general.button.edit') }}"
                   class='btn btn-default'>{{ trans('general.button.edit') }}</a>
            @endif
        </div>

        {!! Form::close() !!}

    </div><!-- /.card -->

@endsection

@section('page_specific_scripts')
    <!-- Select2 js -->
    @include($view_path.'.partials._body_bottom_select2_js_role_search')
@endsection
