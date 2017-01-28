<?php $membershipFixed = ($role->canChangeMembership()) ? '' : 'disabled'; ?>

<div>
    {!! Form::hidden('selected_users', null, [ 'id' => 'selected_users']) !!}
    <div class="input-group select2-bootstrap-append">
        {!! Form::select('user_search', [], null, ['class' => 'form-control', 'id' => 'user_search',  'style' => "width: 100%", $membershipFixed]) !!}
        <span class="input-group-btn">
                    <button class="btn btn-default" id="btn-add-user" type="button" {!! $membershipFixed !!}>
                        <i class="material-icons">add</i>
                    </button>
                </span>
    </div>
</div>
<div class="card">
    <table class="table table-hover" id="tbl-users">
        <tbody>
        <tr>
            <th class="hidden" rowname="id">{!! trans($trans_path. 'general.columns.id')  !!}</th>
            <th>{!! trans($trans_path. 'general.columns.name')  !!}</th>
            <th>{!! trans($trans_path. 'general.columns.username')  !!}</th>
            <th>{!! trans($trans_path. 'general.columns.enabled')  !!}</th>
            <th style="text-align: right">{!! trans($trans_path. 'general.columns.actions')  !!}</th>
        </tr>
        @foreach($role->users as $user)
            <tr>
                <td class="hidden" rowname="id">{!! $user->id !!}</td>
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
                    <a class="btn-remove-user" href="#" title="{{ trans('general.button.remove-user') }}"><i
                                class="fa fa-trash-o deletable"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
