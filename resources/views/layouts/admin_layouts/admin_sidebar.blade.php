<style>
    .sidebar-mini.sidebar-collapse .main-sidebar,
    .sidebar-mini.sidebar-collapse .main-sidebar::before {
        position: fixed !important;
    }

    .sidebar-dark-primary {
        background: #fff !important;
     }

    .info{
        width: 100%;
    }

    .btnSiteColor{
        width: 244px;
        height: 45px !important;
        left: 16px;
        top: 148px;
        background: #0CA2A3;
        color: #fff !important;
    }

    .btnDashboard{
        position: absolute;
        width: 100%;
        height: 44px !important;
        clear: both;
    }

    .sidebar-dark-primary a {
      color: #fff !important;
      padding: 12px !important;
      color: #017EFA !important;
      border-top-left-radius: 3px;
      border-bottom-left-radius: 3px;
    }

    .sidebar .mb-3{
        padding-bottom: 4rem !important;
    }



</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
        <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="AdminLTE Logo" class="brand-image"
            style="opacity:1">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image"></div>
            <div class="info">
                Main Menu<!---->
                <br>
                <div class="btnDashboard"><a href="{{ route('dashboard') }}" class="nav-link d-block btnSiteColor" style="color: #fff !important;"><i class="nav-icon fas fa-tachometer-alt"></i> <p>Dashboard</p></a></div>
            </div>
            <!--{{ ucfirst(Auth::user()->name) }}-->
            
        </div>

<style type="text/css">
.tree, .tree ul {
    margin:0;
    padding:0;
    list-style:none
}
.tree ul {
    margin-left:1em;
    position:relative
}
.tree ul ul {
    margin-left:.5em
}
.tree ul:before {
    content:"";
    display:block;
    width:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    border-left:1px solid
}
.tree li {
    margin:0;
    padding:0;
    line-height:2em;
    color:#0CA2A3;
    font-weight:700;
    position:relative;
}


.tree ul li:before {
    content:"";
    display:block;
    width:10px;
    height:0;
    border-top:1px solid;
    margin-top:10px;
    position:absolute;
    top:1em;
    left:0;
    color:#0CA2A3;
}
.tree ul li:last-child:before {
    background:#fff;
    height:auto;
    top:1em;
    bottom:0
}
.indicator {
    margin-right:5px;
    display: none;
}
.tree li a {
    text-decoration: none;
    color:#0CA2A3;
}
.tree li button, .tree li button:active, .tree li button:focus {
    text-decoration: none;
    color:#369;
    border:none;
    background:transparent;
    margin:0px 0px 0px 0px;
    padding:0px 0px 0px 0px;
    outline: 0;
}

.tree li.branch .fa-users::before{
    padding-left: 5px;
    color: #0CA2A3;
}

.tree li.branch a{
    color: #000 !important;
    background-color: transparent;
    margin-top: 15px;
    width: 100%;
    display: block;
    font-weight: normal;
}

.tree li.branch li a {
    color: #0CA2A3 !important;
    background-color: #fff;
    margin-top: 0;
    width: 100%;
    display: block;
    padding: 0 !important;
}

.tree li.branch .fa-users{
    display: block !important;
}

.tree li.branch .fa-users::before {
  padding-top: 7px !important;
  display: block;
  margin-right: 10px;
}

.tree li.branch ul li{
    padding-left: 12px;
}
.fa-tachometer-alt{
    float: left;
    margin-right: 8px;
    display: block;
    padding-top: 3px;
}

.nav-link{
    margin-top:0 !important;
}

[class*="sidebar-dark-"] .nav-sidebar > .nav-item:hover > .nav-link{
    color: #fff !important;
    background-color: #0CA2A3;
}

.menuLabel{
    display: block !important;
}

.nav-pills .nav-link.active, .nav-pills .show > .nav-link{
    background-color: transparent !important;
}

nav.mt-2 a.nav-link{
     color: #000 !important;
     background-color: none transparent;
}

.mt-2 [class*="sidebar-dark-"] .nav-sidebar > .nav-item:hover > .nav-link {
  color: #000 !important;
}

.nav-pills li a:hover{
  color: #000;
}


.nav-pills > .nav-item > .nav-link> p {
  color: #000 !important;
  background-color: #fff;
}

.nav-pills > .nav-item > .nav-link> p:hover {
  color: #000 !important;
  background-color: #fff;
}

[class*="sidebar-dark-"] .nav-sidebar > .nav-item > .nav-link.active {
  color: #fff;
  box-shadow: none !important;
}

.nav-pills > .nav-item:hover > .nav-link:hover {
  color: #000 !important;
  background-color: #fff;
}

.allDisplay{
    display: block !important;
    float: left;
    margin-right: 10px;
}


.tree ul li.beforeNull::before{
    display: none !important;
}

.tree ul.beforeNull::before{
    display: none !important;
}

#tree3 li li a{
  padding-top:10px !important;
  padding-bottom:10px !important;
}

</style>


<div class="col-md-12" style="padding: 0;">
      
      <ul id="tree3" class="tree nav nav-sidebar flex-column">
         
        <li class="nav-item"><a class="nav-link"> <i class="fas fa-users" style="display:block !important; float: left;"></i> <p class="menuLabel">Admin</p></a>
              <ul>
                <li><a href="{{ route('users.index') }}">User</a></li>
                <li><a href="{{ route('client-name') }}">Client</a></li>
                <li><a href="{{ route('all-cases') }}">Case</a></li>
                <li><a href="#">Counsel</a></li>
                <li><a href="#">Case Proceedings</a></li>
                <li><a href="#">Documents</a></li>
                <li><a href="{{ route('billing') }}">Billings</a></li>
                <li><a href="#">Opposition</a></li>
                <li><a href="#">Area</a></li>
                <li><a href="{{ route('legal-service') }}">Legal Service</a></li>
                <!--<li>
                  <ul>
                    <li>Reports
                      <ul>
                        <li>Report1</li>
                        <li>Report2</li>
                        <li>Report3</li>
                      </ul>
                    </li>
                    <li>Employee Maint.</li>
                  </ul>
                </li>
                <li>Human Resources</li>-->
              </ul>
        </li>
        <li class="nav-item"><a class="nav-link"> <img class="allDisplay" src="{{ asset('login_assets/img/litigation.jpg') }}" width="23px" style="display:block !important; float:left; margin-right: 5px;" /> <p class="menuLabel">Litigation</p></a>
              <ul class="beforeNull">
                <li class="beforeNull"> <img class="allDisplay" src="{{ asset('login_assets/img/all-cases.png') }}" width="20px" style="display:block !important; float:left; margin-right: 5px; margin-top: 5px;" /> Cases
                    <ul>
                    <li><a href="{{ route('all-cases') }}">All</a></li>
                    <li><a href="{{ route('criminal-cases') }}">District</a></li>
                    <li><a href="{{ route('special-court-cases-all') }}">Special</a></li>
                    <li><a href="{{ route('high-court-cases') }}">High Court</a></li>
                    <li><a href="{{ route('appellate-court-cases') }}">Appellate Court</a></li>
                  </ul>
                </li>
                <li class="beforeNull"> <img src="{{ asset('login_assets/img/reports.png') }}" width="17px" style="display:block !important; float:left; margin-right: 5px; margin-top: 5px;" />Reports
                  <ul>
                    <li>Report1</li>
                    <li>Report2</li>
                    <li>Report3</li>
                  </ul>
                </li>
              </ul>
        </li>
        <!--<li style="margin-top:10px;">XRP
          <ul>
            <li>Company Maintenance</li>
            <li>Employees
              <ul>
                <li>Reports
                  <ul>
                    <li>Report1</li>
                    <li>Report2</li>
                    <li>Report3</li>
                  </ul>
                </li>
                <li>Employee Maint.</li>
              </ul>
            </li>
            <li>Human Resources</li>
          </ul>
        </li>-->
        <li class="nav-item"><a class="nav-link"> <img class="allDisplay" src="{{ asset('login_assets/img/task.jpg') }}" width="23px" style="display: none; float: left; margin-right: 5px;s" /> <p class="menuLabel">Task</p></a>
              <ul>
                <li><a href="{{ route('task.index') }}">Task</a></li>
                <li><a href="{{ route('schedule.index') }}">Schedule</a></li>
                <li><a href="{{ route('assignment.index') }}">Assignment</a></li>                
              </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('employee-new') }}" class="nav-link">
                <!--<i class="nav-icon fas fa-circle"></i>-->
                <img src="{{ asset('login_assets/img/hr.jpg') }}" width="23px" />
                <p>
                    HR
                    <!--<i class="right fas fa-angle-left"></i>-->
                </p>
            </a>
        </li>
        <li class="nav-item"><a class="nav-link"> <img class="allDisplay" src="{{ asset('login_assets/img/account.jpg') }}" width="23px" style="display: none; float: left; margin-right: 5px;s" /> <p class="menuLabel">Account</p></a>
              <ul>
                <li><a href="{{ route('billing') }}">Billings</a></li>
                <li><a href="{{ route('ledger-entry.index') }}">Ledger-Entry</a></li>
                <li><a href="{{ route('ledger-report') }}">Ledger-Report</a></li>
                <li><a href="{{ route('balance-report') }}">Balance-Report</a></li>
                <li><a href="{{ route('billing-report') }}">Billing-Report</a></li>                
                <li><a href="{{ route('income-expense-report') }}">Income Expense-Report</a></li>
              </ul>
        </li>
      </ul>
    </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @canany(['civil-cases-list', 'criminal-cases-list', 'service-matter-list', 'quassi-judicial-cases-list',
                    'high-court-cases-list', 'appellate-court-cases-list', 'search-wizard-list', 'billing-list'])
                    <!--<li class="nav-item">
                        <a href="#" class="nav-link">
                            <!--<i class="nav-icon fas fa-circle"></i>-->
                        <!--    <img src="{{ asset('login_assets/img/litigation.jpg') }}" width="23px" />
                            <p>
                                Litigation
                                <!--<i class="right fas fa-angle-left"></i>-->
                       <!--     </p>
                        </a>
                        <!--<ul class="nav nav-treeview">
                            @canany(['civil-cases-list', 'criminal-cases-list', 'service-matter-list',
                                'quassi-judicial-cases-list', 'high-court-cases-list', 'appellate-court-cases-list'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Class of Cases
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        {{-- @can('civil-cases-list')
                                        <li class="nav-item">
                                                                <a href="{{ route('civil-cases') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Civil</p>
                                                </a>
                                        </li>
                                        @endcan --}}
                    


                                        @can('criminal-cases-list')
                                            <li class="nav-item">
                                                <a href="{{ route('criminal-cases') }}" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>District Court</p>
                                                </a>
                                            </li>
                                        @endcan
                                        {{-- @can('service-matter-list')
                                        <li class="nav-item">
                                            <a href="{{ route('labour-cases') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Employee Case</p>
                                                </a>
                                        </li>
                                        @endcan --}}
                                        @can('quassi-judicial-cases-list')
                                            <li class="nav-item">
                                                <a href="{{ route('special-court-cases-all') }}" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Special Court</p>
                                                </a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                                                    <a href="{{ route('quassi-judicial-cases') }}" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Special Court</p>
                                                    </a>
                                                </li> --}}
                                                                                
                                            @endcan

                                        @can('high-court-cases-list')
                                            <li class="nav-item">
                                                <a href="{{ route('high-court-cases') }}" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>High Court Division</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('appellate-court-cases-list')
                                            <li class="nav-item">
                                                <a href="{{ route('appellate-court-cases') }}" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Appellate Division</p>
                                                </a>
                                            </li>
                                        @endcan




                                        {{-- @canany(['high-court-cases-list', 'appellate-court-cases-list'])
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>
                                                    Supreme Court
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                @can('high-court-cases-list')
                                                    <li class="nav-item">
                                                        <a href="{{ route('high-court-cases') }}" class="nav-link">
                                                        <i class="far fa-dot-circle nav-icon"></i>
                                                        <p>High Court Division</p>
                                                        </a>
                                                        </li>
                                                        @endcan
                                                        @can('appellate-court-cases-list')
                                                        <li class="nav-item">
                                                            <a href="{{ route('appellate-court-cases') }}" class="nav-link">
                                                                <i class="far fa-dot-circle nav-icon"></i>
                                                                <p>Appellate Court Division</p>
                                                            </a>
                                                        </li>
                                                        @endcan
                                            </ul>
                                            </li>
                                            @endcanany --}}
                                        </ul>-->
                                <!--    </li>-->
                                    <li class="nav-item">
                                        <a href="{{ route('legal-service') }}" class="nav-link">
                                            <!--<i class="nav-icon fas fa-circle"></i>-->
                                            <img src="{{ asset('login_assets/img/legal-services.jpg') }}" width="23px" />
                                            <p>
                                                Legal Services
                                                <!--<i class="right fas fa-angle-left"></i>-->
                                            </p>
                                        </a>
                                    </li>
                                   <!-- <li class="nav-item">
                                        <a href="{{ route('employee-new') }}" class="nav-link">
                                            <!--<i class="nav-icon fas fa-circle"></i>-->
                                            <!--<img src="{{ asset('login_assets/img/hr.jpg') }}" width="23px" />
                                            <p>
                                                HR
                                                <!--<i class="right fas fa-angle-left"></i>-->
                                            <!--</p>
                                        </a>
                                    </li>-->
                                    <!--<li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <!--<i class="nav-icon fas fa-circle"></i>-->
                                         <!--   <img src="{{ asset('login_assets/img/account.jpg') }}" width="23px" />
                                            <p>
                                                Account
                                                <!--<i class="right fas fa-angle-left"></i>-->
                                            <!--</p>
                                        </a>
                                    </li>-->
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <!--<i class="nav-icon fas fa-circle"></i>-->
                                            <img src="{{ asset('login_assets/img/settings.jpg') }}" width="23px" />
                                            <p>
                                                Settings
                                                <!--<i class="right fas fa-angle-left"></i>-->
                                            </p>
                                        </a>
                                    </li>

                                    @endcanany

                        </ul>
                    </li>
                @endcanany


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
