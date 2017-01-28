@extends('admin.layouts.master')

@section('content')

    @include('admin.partials.breadcrumb')

    <div class="card">
        {!! Form::open( array('route' => 'admin.users.enable-selected', 'id' => 'frmUserList') ) !!}
            <div class="card-header">

                {{ trans($trans_path.'general.content.list') }}

                <span class="pull-right">
                    <a class="btn btn-default btn-sm" href="{!! route('admin.users.create') !!}" title="{{ trans($trans_path.'general.button.create') }}">
                        <i class="fa fa-plus-square"></i>
                    </a>
                    &nbsp;
                    <a class="btn btn-default btn-sm" href="#"
                       onclick="document.forms['frmUserList'].action = '{{ route('admin.users.enable-selected') }}';  document.forms['frmUserList'].submit(); return false;"
                       title="{{ trans('general.button.enable') }}">
                        <i class="fa fa-check-circle-o"></i>
                    </a>
                    &nbsp;
                    <a class="btn btn-default btn-sm" href="#"
                       onclick="document.forms['frmUserList'].action = '{{ route('admin.users.disable-selected') }}';  document.forms['frmUserList'].submit(); return false;"
                       title="{{ trans('general.button.disable') }}">
                        <i class="fa fa-ban"></i>
                    </a>
                </span>
            </div>
            <table class="table">
            <thead>
            <tr>
                <th>
                    <a class="btn" href="#" onclick="toggleCheckbox(); return false;" title="{{ trans('general.button.toggle-select') }}">
                        <i class="fa fa-check-square-o"></i>
                    </a>
                </th>
                <th>{{ trans($trans_path.'general.columns.username') }}</th>
                <th>{{ trans($trans_path.'general.columns.name') }}</th>
                <th>{{ trans($trans_path.'general.columns.roles') }}</th>
                <th>{{ trans($trans_path.'general.columns.email') }}</th>
                <th>{{ trans($trans_path.'general.columns.actions') }}</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>
                    <a class="btn" href="#" onclick="toggleCheckbox(); return false;" title="{{ trans('general.button.toggle-select') }}">
                        <i class="fa fa-check-square-o"></i>
                    </a>
                </th>
                <th>{{ trans($trans_path.'general.columns.username') }}</th>
                <th>{{ trans($trans_path.'general.columns.name') }}</th>
                <th>{{ trans($trans_path.'general.columns.roles') }}</th>
                <th>{{ trans($trans_path.'general.columns.email') }}</th>
                <th>{{ trans($trans_path.'general.columns.actions') }}</th>
            </tr>

            <tr>
                <td align="right" colspan="6">{!! $users->render() !!}</td>
            </tr>
            </tfoot>

            <tbody>


            @foreach($users as $user)
                <tr>
                    <td align="center">
                        @if ($user->canBeDisabled())
                            {!! Form::checkbox('chkUser[]', $user->id) !!}
                        @endif
                    </td>
                    <td>{!! link_to_route('admin.users.show', $user->username, [$user->id], []) !!}</td>
                    <td>{!! link_to_route('admin.users.show', $user->full_name, [$user->id], []) !!}</td>
                    <td>{{ ViewHelper::getRolesExceptUserRole($user->roles) }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ( $user->isEditable() )
                            <a href="{!! route('admin.users.edit', $user->id) !!}" title="{{ trans('general.button.edit') }}"><i class="fa fa-pencil-square-o"></i></a>
                        @else
                            <i class="fa fa-pencil-square-o text-muted" title="{{ trans($trans_path.'general.error.cant-be-edited') }}"></i>
                        @endif

                        @if ($user->canBeDisabled())
                            @if ( $user->enabled )
                                <a href="{!! route('admin.users.disable', $user->id) !!}" title="{{ trans('general.button.disable') }}"><i class="fa fa-check-circle-o enabled"></i></a>
                            @else
                                <a href="{!! route('admin.users.enable', $user->id) !!}" title="{{ trans('general.button.enable') }}"><i class="fa fa-ban disabled"></i></a>
                            @endif
                        @else
                            <i class="fa fa-ban text-muted" title="{{ trans($trans_path.'general.error.cant-be-disabled') }}"></i>
                        @endif

                        @if ( $user->isDeletable() )
                            <a href="#" onclick="confirmDelete('{!! route('admin.users.confirm-delete', $user->id) !!}')"
                               title="{{ trans('general.button.delete') }}"><i class="fa fa-trash-o deletable"></i></a>
                        @else
                            <i class="fa fa-trash-o text-muted" title="{{ trans($trans_path.'general.error.cant-be-deleted') }}"></i>
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {!! Form::close() !!}
    </div>


@endsection


<!-- Optional bottom section for modals etc... -->
@section('page_specific_scripts')
    <script language="JavaScript">
        function toggleCheckbox() {
            checkboxes = document.getElementsByName('chkUser[]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = !checkboxes[i].checked;
            }
        }
    </script>

@endsection