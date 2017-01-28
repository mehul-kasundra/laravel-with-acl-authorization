@extends('admin.layouts.master')

@section('content')

    @include('admin.partials.breadcrumb')

    {!! Form::open( array('route' => 'admin.roles.enable-selected', 'id' => 'frmRoleList') ) !!}
    <div class="card">
        <div class="card-header">
            {{ trans($trans_path.'general.content.list') }}
            <span class="pull-right">
                <a class="btn btn-default btn-sm" href="{!! route('admin.roles.create') !!}"
                   title="{{ trans($trans_path . 'general.button.create') }}">
                    <i class="fa fa-plus-square"></i>
                </a>
                &nbsp;
                <a class="btn btn-default btn-sm" href="#"
                   onclick="document.forms['frmRoleList'].action = '{!! route('admin.roles.enable-selected') !!}';  document.forms['frmRoleList'].submit(); return false;"
                   title="{{ trans('general.button.enable') }}">
                    <i class="fa fa-check-circle-o"></i>
                </a>
                &nbsp;
                <a class="btn btn-default btn-sm" href="#"
                   onclick="document.forms['frmRoleList'].action = '{!! route('admin.roles.disable-selected') !!}';  document.forms['frmRoleList'].submit(); return false;"
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
                <th>{{ trans($trans_path . 'general.columns.name') }}</th>
                <th>{{ trans($trans_path . 'general.columns.display_name') }}</th>
                <th>{{ trans($trans_path . 'general.columns.description') }}</th>
                <th>{{ trans($trans_path . 'general.columns.permissions') }}</th>
                <th>{{ trans($trans_path . 'general.columns.users') }}</th>
                <th>{{ trans($trans_path . 'general.columns.actions') }}</th>
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
                <th>{{ trans($trans_path . 'general.columns.name') }}</th>
                <th>{{ trans($trans_path . 'general.columns.display_name') }}</th>
                <th>{{ trans($trans_path . 'general.columns.description') }}</th>
                <th>{{ trans($trans_path . 'general.columns.permissions') }}</th>
                <th>{{ trans($trans_path . 'general.columns.users') }}</th>
                <th>{{ trans($trans_path . 'general.columns.actions') }}</th>
            </tr>
            <tr>
                <td align="right" colspan="6">{!! $roles->render() !!}</td>
            </tr>
            </tfoot>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td align="center">{!! Form::checkbox('chkRole[]', $role->id) !!}</td>
                    <td>{!! link_to_route('admin.roles.show', $role->name, [$role->id], []) !!}</td>
                    <td>{!! link_to_route('admin.roles.show', $role->display_name, [$role->id], []) !!}</td>
                    <td>{{ $role->description }}</td>
                    <td>{{ $role->perms->count() }}</td>
                    <td>{{ $role->users->count() }}</td>
                    <td>
                        @if ( $role->isEditable() || $role->canChangePermissions() )
                            <a href="{!! route('admin.roles.edit', $role->id) !!}"
                               title="{{ trans('general.button.edit') }}"><i
                                        class="fa fa-pencil-square-o"></i></a>
                        @else
                            <i class="fa fa-pencil-square-o text-muted"
                               title="{{ trans($trans_path . 'general.error.cant-edit-this-role') }}"></i>
                        @endif

                        @if ( $role->enabled )
                            <a href="{!! route('admin.roles.disable', $role->id) !!}"
                               title="{{ trans('general.button.disable') }}"><i
                                        class="fa fa-check-circle-o enabled"></i></a>
                        @else
                            <a href="{!! route('admin.roles.enable', $role->id) !!}"
                               title="{{ trans('general.button.enable') }}"><i
                                        class="fa fa-ban disabled"></i></a>
                        @endif

                        @if ( $role->isDeletable() )

                                <a href="#" onclick="confirmDelete('{!! route('admin.roles.confirm-delete', $role->id) !!}')"
                                   title="{{ trans('general.button.delete') }}"><i class="fa fa-trash-o deletable"></i></a>
                            </a>
                        @else
                            <i class="fa fa-trash-o text-muted"
                               title="{{ trans($trans_path . 'general.error.cant-delete-this-role') }}"></i>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {!! Form::close() !!}
@endsection


@section('page_specific_scripts')

    <!-- Optional bottom section for modals etc... -->
    <script language="JavaScript">
        function toggleCheckbox() {
            checkboxes = document.getElementsByName('chkRole[]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = !checkboxes[i].checked;
            }
        }
    </script>

@endsection



