<div class="sidebar sidebar-left si-si-3 sidebar-visible-md-up sidebar-dark bg-primary" id="sidebarLeft" data-scrollable>


    <!-- Brand -->
    <a href="{{ route('admin.users.index') }}" class="sidebar-brand">
        <i class="material-icons">control_point</i> {{ AppHelper::getConfigValue('COMPANY_NAME') }}
    </a>

    <!-- User -->
    <a href="{{ route('admin.users.index') }}" class="sidebar-link sidebar-user">
        <span class="user-img-round">
                <span class="name-char">{{ AppHelper::getUserCode() }}</span>
            </span>
         <span class="user-name">
             {{Auth::user()->first_name}} {{Auth::user()->middle_name}} {{Auth::user()->last_name}}
         </span>

    </a>
    <!-- // END User -->


    <div id="admin-menu-wrapper">

        {!! AdminMenuHelper::getMenu() !!}

    </div>


    <!-- // END Menu -->


</div>