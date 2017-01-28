<div>
    {!! Form::hidden('selected_roles', null, [ 'id' => 'selected_roles']) !!}
    <div class="input-group select2-bootstrap-append">
        {!! Form::select('role_search', [], null, ['class' => 'form-control', 'id' => 'role_search',  'style' => "width: 100%"]) !!}
        <span class="input-group-btn">
                    <button class="btn btn-default" id="btn-add-role" type="button">
                        <i class="material-icons">add</i>
                    </button>
                </span>
    </div>
</div>
<div class="card">
    <table class="table table-hover" id="tbl-roles">
        <thead>
        <tr>
            <th rowname="id">{!! trans($trans_path.'general.columns.id')  !!}</th>
            <th>{!! trans($trans_path.'general.columns.name')  !!}</th>
            <th>{!! trans($trans_path.'general.columns.description')  !!}</th>
            <th>{!! trans($trans_path.'general.columns.enabled')  !!}</th>
            <th style="text-align: right">{!! trans($trans_path.'general.columns.actions')  !!}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->roles as $role)
            <tr>
                <td rowname="id">{!! $role->id !!}</td>
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
                    <a class="btn-remove-role" href="#"
                       title="{{ trans('general.button.remove-role') }}"><i class="fa fa-trash-o deletable"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>