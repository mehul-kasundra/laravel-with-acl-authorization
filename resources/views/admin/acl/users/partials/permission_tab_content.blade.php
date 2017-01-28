<table class="table table-hover">
    <thead>
    <tr>
        <th>{!! trans($trans_path.'general.columns.name')  !!}</th>
        <th>{!! trans($trans_path.'general.columns.effective')  !!}</th>
    </tr>
    </thead>
    <tbody>
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