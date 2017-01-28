<nav class="navbar navbar-light navbar-full navbar-fixed-top ls-left-sidebar">

    <!-- Sidebar toggle -->
    <button class="navbar-toggler pull-xs-left hidden-lg-up" type="button"
            data-toggle="sidebar" data-target="#sidebarLeft"><span class="material-icons">menu</span></button>


    <ul class="nav navbar-nav pull-xs-right hidden-md-down">
        <!-- Notifications dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-caret="false" data-toggle="dropdown" role="button"
               aria-haspopup="false"><i class="material-icons email">mail_outline</i></a>
            <ul class="dropdown-menu dropdown-menu-right notifications" aria-labelledby="Preview">
                <li class="dropdown-title">Emails</li>
                <li class="dropdown-item email-item">
                    <a class="nav-link" href="index.html">
                            <span class="media">
                              <span class="media-left media-middle"><i class="material-icons">mail</i></span>
                            <span class="media-body media-middle">
                                <small class="pull-xs-right text-muted">12:20</small>
                                <strong>Adrian Demian</strong>
                                Enhance your website with
                              </span>
                            </span>
                    </a>
                </li>
                <li class="dropdown-item email-item">
                    <a class="nav-link" href="index.html">
                            <span class="media">
          <span class="media-left media-middle">
            <i class="material-icons">mail</i>
          </span>
                            <span class="media-body media-middle">
            <small class="text-muted pull-xs-right">30 min</small>
            <strong>Michael Brain</strong>
            Partnership proposal
          </span>
                            </span>
                    </a>
                </li>
                <li class="dropdown-item email-item">
                    <a class="nav-link" href="index.html">
                            <span class="media">
          <span class="media-left media-middle">
            <i class="material-icons">mail</i>
          </span>
                            <span class="media-body media-middle">
            <small class="text-muted pull-xs-right">1 hr</small>
            <strong>Sammie Downey</strong>
            UI Design
          </span>
                            </span>
                    </a>
                </li>
                <li class="dropdown-action center">
                    <a href="email.html">Go to inbox</a>
                </li>
            </ul>
        </li>
        <!-- // END Notifications dropdown -->
        <!-- User dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle p-a-0" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false">
                <!-- this if no image-->
                <span class="user-img-round">
                            <span class="name-char">{{ AppHelper::getUserCode() }}</span>
                    </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-list" aria-labelledby="Preview">
                <a class="dropdown-item" href="{{route('admin.logout')}}"><i
                            class="sidebar-menu-icon material-icons md-18">lock</i> Logout</a>
            </div>
        </li>
        <!-- // END User dropdown -->
    </ul>

</nav>