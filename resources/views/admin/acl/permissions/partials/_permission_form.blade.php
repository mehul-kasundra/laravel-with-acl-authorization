<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="#tab_details" data-toggle="tab">
            {!! trans('general.tabs.details') !!}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#tab_options" data-toggle="tab">
            {!! trans('general.tabs.options') !!}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#tab_routes" data-toggle="tab">
            {!! trans('general.tabs.routes') !!}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#tab_roles" data-toggle="tab">
            {!! trans('general.tabs.roles') !!}
        </a>
    </li>
</ul>

<div class="card-block tab-content">
    <div class="tab-pane active" id="tab_details">
        @include($view_path.'.partials.general_details_tab_content')
    </div>
    <div class="tab-pane" id="tab_options">
        @include($view_path.'.partials.options_tab_content')
    </div>
    <div class="tab-pane" id="tab_routes">
        @include($view_path.'.partials.routes_tab_content')
    </div>
    <div class="tab-pane" id="tab_roles">
        @include($view_path.'.partials.roles_tab_content')
    </div>
</div>