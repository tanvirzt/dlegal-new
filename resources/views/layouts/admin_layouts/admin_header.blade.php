<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/admin/dashboard" class="nav-link">Home</a>
        </li>

    </ul>

@php
    $notifications = \App\Models\CasesNotifications::where('received_by',Auth::guard('admin')->user()->email)->get();
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
                    <a href="{{ route('view-criminal-cases', $data->case_id) }}" class="dropdown-item"><p> <b>
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

        {{-- <li class="nav-item dropdown">
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
        </li> --}}

        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-user custom_size"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.logout') }}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>

    </ul>
</nav>
<!-- /.navbar -->
