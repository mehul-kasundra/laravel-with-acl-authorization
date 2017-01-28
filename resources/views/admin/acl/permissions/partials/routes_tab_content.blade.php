<div>
    {!! Form::hidden('selected_routes', null, [ 'id' => 'selected_routes']) !!}
    <div class="input-group select2-bootstrap-append">
        {!! Form::select('route_search', [], null, ['class' => 'form-control', 'id' => 'route_search',  'style' => "width: 100%"]) !!}
        <span class="input-group-btn">
                    <button class="btn btn-default" id="btn-add-route" type="button">
                        <i class="material-icons">add</i>
                    </button>
                </span>
    </div>
</div>
<div class="card">
    <table class="table table-hover" id="tbl-routes">
        <tbody>
        <tr>
            <th class="hidden"
                rowname="id">{!! trans(AppHelper::getTransPathFromViewPath('admin.acl.routes'). 'general.columns.id')  !!}</th>
            <th>{!! trans(AppHelper::getTransPathFromViewPath('admin.acl.routes'). 'general.columns.method')  !!}</th>
            <th>{!! trans(AppHelper::getTransPathFromViewPath('admin.acl.routes'). 'general.columns.path')  !!}</th>
            <th>{!! trans(AppHelper::getTransPathFromViewPath('admin.acl.routes'). 'general.columns.enabled')  !!}</th>
            <th style="text-align: right">{!! trans(AppHelper::getTransPathFromViewPath('admin.acl.routes'). 'general.columns.actions')  !!}</th>
        </tr>
        @foreach($perm->routes as $route)
            <tr>
                <td class="hidden" rowname="id">{!! $route->id !!}</td>
                <td>{!! link_to_route('admin.routes.show', $route->method, [$route->id], []) !!}</td>
                <td>{!! link_to_route('admin.routes.show', $route->path, [$route->id], []) !!}</td>
                <td>
                    @if($route->enabled)
                        <i class="fa fa-check text-green"></i>
                    @else
                        <i class="fa fa-close text-red"></i>
                    @endif
                </td>
                <td style="text-align: right">
                    <a class="btn-remove-route" href="#" title="{{ trans('general.button.remove-route') }}"><i
                                class="fa fa-trash-o deletable"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>