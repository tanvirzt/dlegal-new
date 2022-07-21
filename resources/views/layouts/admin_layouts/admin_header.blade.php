


<!-- Navbar -->



<nav class="main-header navbar navbar-expand navbar-white navbar-light links_custom" style="padding: 0px;background: #2A6CB1;position:fixed;padding-right:89px;z-index:1020;">
    {{-- style="background: #2A6CB1;" --}}
    <!-- Left navbar links -->
    {{-- <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color:white;" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" style="color:white;" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Litigation Calendar
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <a class="dropdown-item" href="{{ route('litigation-calender-list') }}">Litigation Calendar (List)</a>
                <a class="dropdown-item" href="{{ route('litigation-calender-short') }}">Litigation Calendar (Short)</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Case Dashboard
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">

                <a class="dropdown-item" href="{{ route('civil-cases') }}">Civil</a>
                <a class="dropdown-item" href="{{ route('criminal-cases') }}">Criminal</a>
                <a class="dropdown-item" href="{{ route('labour-cases') }}">Service Matter</a>
                <a class="dropdown-item" href="{{ route('quassi-judicial-cases') }}">Special/Quassi-Judicial Cases</a>
                <a class="dropdown-item" href="{{ route('high-court-cases') }}">High Court Division</a>
                <a class="dropdown-item" href="{{ route('appellate-court-cases') }}">Appellate Court Division</a>

            </div>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" style="color:white;" class="nav-link">Legal Service</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" style="color:white;" class="nav-link">Compliance MGT</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" style="color:white;" class="nav-link">Document MGT</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" style="color:white;" class="nav-link">Property MGT</a>
        </li>
    </ul> --}}


    <style>
        .custom_ul{
            padding: 0;
            list-style: none;
            /* background: #f2f2f2; */
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
            min-width: 100%; /* Set width of the dropdown */
            background: #f2f2f2;
            display: none;
            position: absolute;
            z-index: 999;
            left: 0;
            padding-left: 0px;
        }
        .custom_ul li:hover ul.dropdown{
            display: block;	/* Display the dropdown */
        }
        .custom_ul li ul.dropdown li{
            display: block;
        }
        .dropdown li a{
            color: #333;
        }
        /* .custom_ul li ul a:hover{
            background: #2A6CB1;
        } */
        
        
    </style>

<ul class="custom_ul">
    <li>
        <a class="nav-link colapse_left" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li>
        <a href="#">Litigation Calendar &#9662;</a>
        <ul class="dropdown" style="background:#c3c9cf;">
            <li><a href="{{ route('litigation-calender-list') }}">Litigation Calendar (List)</a></li>
            <li><a href="{{ route('litigation-calender-short') }}">Litigation Calendar (Short)</a></li>
        </ul>
    </li>
    <li>
        <a href="#">Case Dashboard &#9662;</a>
        <ul class="dropdown" style="background:#c3c9cf;">
            <li><a href="{{ route('civil-cases') }}">Civil</a></li>
            <li><a href="{{ route('criminal-cases') }}">Criminal</a></li>
            <li><a href="{{ route('labour-cases') }}">Service Matter</a></li>
            <li><a href="{{ route('quassi-judicial-cases') }}">Special/Quassi-Judicial Cases</a></li>
            <li><a href="{{ route('high-court-cases') }}">High Court Division</a></li>
            <li><a href="{{ route('appellate-court-cases') }}">Appellate Court Division</a></li>
        </ul>
    </li>
    
    <li><a href="#">Legal Service</a></li>
    <li><a href="#">Compliance MGT</a></li>
    <li><a href="#">Documents MGT</a></li>
    <li><a href="#">Property MGT</a></li>


</ul>

    {{-- <ul class="navbar-nav">
        
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" style="color:white;" class="nav-link">Compliance MGT</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" style="color:white;" class="nav-link">Document MGT</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" style="color:white;" class="nav-link">Property MGT</a>
        </li>
    </ul> --}}



















@php
    $notifications = \App\Models\CasesNotifications::where('received_by',Auth::guard('admin')->user()->email)->orderBy('created_at', 'desc')->get();
@endphp


<!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown mr-2">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="far fa-bell custom_size"></i>
                <span class="badge badge-warning navbar-badge navbar_badge_custom">{{ $notifications->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <span class="dropdown-item dropdown-header">{{ $notifications->count() }} Notifications</span>
                @foreach($notifications as $data)
                    <div class="dropdown-divider"></div>
                    {{-- <a href="{{ route('view-criminal-cases', $data->case_id) }}" class="dropdown-item"> --}}
                        <a href="{{ route('view-criminal-cases-read-notifications', $data->id) }}" @if ($data->is_read == "Yes")
                            style="background:#fff;"
                        @endif class="dropdown-item">
                        
                        
                        <p> <b>
                        <i class="fas fa-envelope mr-2"></i> {{ $data->case_type }} {{ $data->case_no }} </b> sent to you.</p>
                        {{-- <span class="float-right text-muted text-sm"></span> --}}
                    </a>
                @endforeach
                {{--                <div class="dropdown-divider"></div>--}}
                {{--                <a href="#" class="dropdown-item">--}}
                {{--                    <i class="fas fa-users mr-2"></i> 8 friend requests--}}
                {{--                    <span class="float-right text-muted text-sm">12 hours</span>--}}
                {{--                </a>--}}
                {{--                <div class="dropdown-divider"></div>--}}
                {{--                <a href="#" class="dropdown-item">--}}
                {{--                    <i class="fas fa-file mr-2"></i> 3 new reports--}}
                {{--                    <span class="float-right text-muted text-sm">2 days</span>--}}
                {{--                </a>--}}
                {{--                <div class="dropdown-divider"></div>--}}
                {{--                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
            </div>
        </li>


        <!-- Notifications Dropdown Menu -->

        <li class="nav-item dropdown float-right">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i>
              <span class="badge badge-warning navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">User info</span>
              <div class="dropdown-divider"></div>
            <div class="dropdown-divider"></div>
            <a href="{{ route('admin.logout') }}" class="dropdown-item dropdown-footer">Logout</a>
        </div>
        </li>

    
    </ul>
</nav>
<!-- /.navbar -->

