@extends('admin.layouts.master')

@section('content')

    @include('admin.partials.breadcrumb')

    {!! Form::open( array('route' => 'admin.permissions.enable-selected', 'id' => 'frmPermList') ) !!}
    <div class="card">
        <div class="card-header">
            {{ trans($trans_path.'general.content.list') }}
            <span class="pull-right">
                <a class="btn btn-default btn-sm" href="{!! route('admin.permissions.create') !!}"
                   title="{{ trans($trans_path. 'general.action.create') }}">
                    <i class="fa fa-plus-square"></i>
                </a>
                &nbsp;
                <a class="btn btn-default btn-sm" href="{!! route('admin.permissions.generate') !!}"
                   title="{{ trans($trans_path. 'general.action.generate') }}">
                    <i class="fa fa-refresh"></i>
                </a>
                &nbsp;
                <a class="btn btn-default btn-sm" href="#"
                   onclick="document.forms['frmPermList'].action = '{!! route('admin.permissions.enable-selected') !!}';  document.forms['frmPermList'].submit(); return false;"
                   title="{{ trans('general.button.enable') }}">
                    <i class="fa fa-check-circle-o"></i>
                </a>
                &nbsp;
                <a class="btn btn-default btn-sm" href="#"
                   onclick="document.forms['frmPermList'].action = '{!! route('admin.permissions.disable-selected') !!}';  document.forms['frmPermList'].submit(); return false;"
                   title="{{ trans('general.button.disable') }}">
                    <i class="fa fa-ban"></i>
                </a>
            </span>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th style="text-align: center">
                    <a class="btn" href="#" onclick="toggleCheckbox(); return false;"
                       title="{{ trans('general.button.toggle-select') }}">
                        <i class="fa fa-check-square-o"></i>
                    </a>
                </th>
                <th>{{ trans($trans_path. 'general.columns.display_name') }}</th>
                <th>{{ trans($trans_path. 'general.columns.description') }}</th>
                <th>{{ trans($trans_path. 'general.columns.routes') }}</th>
                <th>{{ trans($trans_path. 'general.columns.roles') }}</th>
                <th>{{ trans($trans_path. 'general.columns.actions') }}</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th style="text-align: center">
                    <a class="btn" href="#" onclick="toggleCheckbox(); return false;"
                       title="{{ trans('general.button.toggle-select') }}">
                        <i class="fa fa-check-square-o"></i>
                    </a>
                </th>
                <th>{{ trans($trans_path. 'general.columns.display_name') }}</th>
                <th>{{ trans($trans_path. 'general.columns.description') }}</th>
                <th>{{ trans($trans_path. 'general.columns.routes') }}</th>
                <th>{{ trans($trans_path. 'general.columns.roles') }}</th>
                <th>{{ trans($trans_path. 'general.columns.actions') }}</th>
            </tr>
            <tr>
                <td align="right" colspan="6">{!! $perms->render() !!}</td>
            </tr>
            </tfoot>
            <tbody>
            @foreach($perms as $perm)
                <tr>
                    <td align="center">{!! Form::checkbox('chkPerm[]', $perm->id); !!}</td>
                    <td>{!! link_to_route('admin.permissions.show', $perm->display_name, [$perm->id], []) !!}</td>
                    <td>{!! link_to_route('admin.permissions.show', $perm->description, [$perm->id], []) !!}</td>
                    <td>{{ $perm->routes->count() }}</td>
                    <td>{{ $perm->roles->count() }}</td>
                    <td>
                        @if ( $perm->isEditable() )
                            <a href="{!! route('admin.permissions.edit', $perm->id) !!}"
                               title="{{ trans('general.button.edit') }}"><i class="fa fa-pencil-square-o"></i></a>
                        @else
                            <i class="fa fa-pencil-square-o text-muted"
                               title="{{ trans($trans_path. 'general.error.cant-edit-this-permission') }}"></i>
                        @endif

                        @if ( $perm->enabled )
                            <a href="{!! route('admin.permissions.disable', $perm->id) !!}"
                               title="{{ trans('general.button.disable') }}"><i
                                        class="fa fa-check-circle-o enabled"></i></a>
                        @else
                            <a href="{!! route('admin.permissions.enable', $perm->id) !!}"
                               title="{{ trans('general.button.enable') }}"><i
                                        class="fa fa-ban disabled"></i></a>
                        @endif

                        @if ( $perm->isDeletable() )
                            <a href="#" onclick="confirmDelete('{!! route('admin.permissions.confirm-delete', $perm->id) !!}')"
                               title="{{ trans('general.button.delete') }}"><i class="fa fa-trash-o deletable"></i></a>
                        @else
                            <i class="fa fa-trash-o text-muted"
                               title="{{ trans($trans_path. 'general.error.cant-delete-perm-in-use') }}"></i>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {!! Form::close() !!}
@endsection


<!-- Optional bottom section for modals etc... -->
@section('page_specific_scripts')
    <script language="JavaScript">
        function toggleCheckbox() {
            checkboxes = document.getElementsByName('chkPerm[]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = !checkboxes[i].checked;
            }
        }
    </script>
@endsection
