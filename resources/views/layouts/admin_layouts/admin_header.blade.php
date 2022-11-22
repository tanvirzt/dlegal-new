{{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light" >
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../../index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">

                    <div class="media">
                        <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>

                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">

                    <div class="media">
                        <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">

                    <div class="media">
                        <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>

                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav> --}}


@if (url()->current() == 'http://localhost/dlegal-software/public/admin/dashboard')

<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="padding: 0px;background: #2A6CB1;position:relative;padding-right:89px;z-index:1020;">

    <style>
        .custom_ul{
            padding: 0;
            list-style: none;
            margin-bottom: 0px;
            background: #2A6CB1;
            transition: all 0.5s ease;
        }
        .custom_ul li{
            display: inline-block;
            position: relative;
            line-height: 21px;
            text-align: left;
        }
        .custom_ul li a{
            display: block;
            padding: 8px 20px;
            color: white;
            text-decoration: none;
        }
        .custom_ul li a:hover{
            color: #333;
            background: #939393;
        }
        .custom_ul li .colapse_left:hover{
            color: #333;
            background: #2A6CB1;
        }
        .custom_ul li ul.dropdown{
            min-width: 100%; 
            background: #f2f2f2;
            display: none;
            position: absolute;
            z-index: 999;
            left: 0;
            padding-left: 0px;
        }
        .custom_ul li:hover ul.dropdown{
            display: block;	
        }
        .custom_ul li ul.dropdown li{
            display: block;
        }
        .dropdown li a{
            color: #333;
        }

    </style>

<ul class="custom_ul">
    <li>
        <a class="nav-link colapse_left" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li>
        <a href="#" style="width: 144px;">Litigation Tracker &#9662;</a>
        <ul class="dropdown" style="background:#c3c9cf;">
            <li><a href="{{ route('litigation-calender-list') }}">Litigation Calendar (List)</a></li>
            <div class="dropdown-divider-custom"></div>
            <li><a href="{{ route('litigation-calender-short') }}">Litigation Calendar</a></li>
        </ul>
    </li>
    <li>
        <a href="#">Case Database &#9662;</a>
        <ul class="dropdown" style="background:#c3c9cf;">
            <li><a href="{{ route('civil-cases') }}">Civil</a></li>
            <div class="dropdown-divider-custom"></div>
            <li><a href="{{ route('criminal-cases') }}">Criminal</a></li>
            <div class="dropdown-divider-custom"></div>
            <li><a href="{{ route('labour-cases') }}">Service Matter</a></li>
            <div class="dropdown-divider-custom"></div>
            <li><a href="{{ route('quassi-judicial-cases') }}">Special/Quassi-Judicial Cases</a></li>
            <div class="dropdown-divider-custom"></div>
            <li><a href="{{ route('high-court-cases') }}">High Court Division</a></li>
            <div class="dropdown-divider-custom"></div>
            <li><a href="{{ route('appellate-court-cases') }}">Appellate Court Division</a></li>
        </ul>
    </li>

    <li><a href="#">Legal Service</a></li>
    <li><a href="#">Compliance MGT</a></li>
    <li><a href="#">Documents MGT</a></li>
    <li><a href="#">Property MGT</a></li>


</ul>
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown float-right">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i>
              <span class="badge badge-warning navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">User info</span>
              <div class="dropdown-divider"></div>
            <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>


              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>


        </div>
        </li>


    </ul>
</nav>

@endif

<nav class="main-header navbar navbar-expand navbar-white navbar-light links_custom @if (url()->current() != 'http://localhost/dlegal-software/public/dashboard') links_custom @endif" style="padding: 0px;background: #2A6CB1;position:fixed;z-index:1020;@if (url()->current() == 'http://localhost/dlegal-software/public/dashboard') margin-top:0px; @endif">
 
    <style>
        .custom_ul{
            padding: 0;
            list-style: none;
            margin-bottom: 0px;
            background: #2A6CB1;
        }
        .custom_ul li{
            display: inline-block;
            position: relative;
            line-height: 21px;
            text-align: left;
        }
        .custom_ul li a{
            display: block;
            padding: 8px 20px;
            color: white;
            text-decoration: none;
        }
        .custom_ul li a:hover{
            color: #333;
            background: #939393;
        }
        .custom_ul li .colapse_left:hover{
            color: #333;
            background: #2A6CB1;
        }
        .custom_ul li ul.dropdown{
            min-width: 100%; 
            background: #f2f2f2;
            display: none;
            position: absolute;
            z-index: 999;
            left: 0;
            padding-left: 0px;
        }
        .custom_ul li:hover ul.dropdown{
            display: block;	
        }
        .custom_ul li ul.dropdown li{
            display: block;
        }
        .dropdown li a{
            color: #333;
        }


    </style>

<ul class="custom_ul">
    <li>
        <a class="nav-link colapse_left" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    @canany(['litigation-calendar-list', 'litigation-calendar-short'])
    <li>
        <a href="#" style="width: 144px;">Litigation Tracker &#9662;</a>
        <ul class="dropdown" style="background:#c3c9cf;">
            @can('litigation-calendar-list')
                <li><a href="{{ route('litigation-calender-list') }}">Litigation Cause List</a></li>
            @endcan
            @can('litigation-calendar-short')
                <div class="dropdown-divider-custom"></div>
                <li><a href="{{ route('litigation-calender-short') }}">Litigation Calendar</a></li>
            @endcan
        </ul>
    </li>
    @endcanany

    @canany(['civil-cases-list', 'criminal-cases-list', 'service-matter-list', 'quassi-judicial-cases-list', 'high-court-cases-list', 'appellate-court-cases-list'])
    <li>
        <a href="#">Case Database &#9662;</a>
        <ul class="dropdown" style="background:#c3c9cf;">
            @can('criminal-cases-list')
            <div class="dropdown-divider-custom"></div>
            <li><a href="{{ route('criminal-cases') }}">District Court</a></li>
            @endcan

            @can('quassi-judicial-cases-list')
            <div class="dropdown-divider-custom"></div>
            <li><a href="{{ route('quassi-judicial-cases') }}">Special Court</a></li>
            @endcan
            @can('high-court-cases-list')
            <div class="dropdown-divider-custom"></div>
            <li><a href="{{ route('high-court-cases') }}">High Court</a></li>
            @endcan
            @can('appellate-court-cases-list')
            <div class="dropdown-divider-custom"></div>
            <li><a href="{{ route('appellate-court-cases') }}">Appellate Court </a></li>
            @endcan
        </ul>
    </li>
    @endcanany
    <li><a href="#">Legal Service</a></li>
    <li><a href="#">Compliance MGT</a></li>
    <li><a href="#">Documents MGT</a></li>
    <li><a href="#">Property MGT</a></li>


</ul>


@php
    $notifications = \App\Models\CasesNotifications::where('received_by',Auth::user()->email)->orderBy('created_at', 'desc')->get();
@endphp

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown mr-2">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="far fa-bell custom_size"></i>
                <span class="badge badge-warning navbar-badge navbar_badge_custom">{{ $notifications->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <span class="dropdown-item dropdown-header">{{ $notifications->count() }} Notifications</span>
                @foreach ($notifications as $data)
                    <div class="dropdown-divider"></div>
                        <a href="{{ route('view-criminal-cases-read-notifications', $data->id) }}" @if ($data->is_read == 'Yes')
                                style="background:#fff;"
                            @endif class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{ $data->case_type }} {{ $data->case_no }} </b> sent to you.</p>
                        </a>
                @endforeach
            </div>
        </li>

        <li class="nav-item dropdown float-right">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i>
              <span class="badge badge-warning navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">User info</span>
              <div class="dropdown-divider"></div>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>



        </div>
        </li>


    </ul>
</nav>
