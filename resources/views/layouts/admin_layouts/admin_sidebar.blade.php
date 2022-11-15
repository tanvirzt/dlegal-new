<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
        <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="AdminLTE Logo" class="brand-image" style="opacity:1">
        {{--        <h2 class="font-weight-light text-center">dLegal</h2> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">


            </div>

            <div class="info">
                <a href="{{ route('dashboard') }}" class="d-block">{{ ucfirst(Auth::user()->name) }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @canany(['role-list', 'user-list', 'domain-setup-list', 'company-type-list', 'company-list'])
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users"></i>
                            <p>
                                User Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if (Auth::user()->is_owner_admin == '1')
                                @can('domain-setup-list')
                                    <li class="nav-item">
                                        <a href="{{ route('domain-setup.index') }}" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Domain Setup</p>
                                        </a>
                                    </li>
                                @endcan
                            @endif
                            @if (Auth::user()->is_owner_admin == '1' || Auth::user()->is_companies_superadmin == '1')
                                @can('company-type-list')
                                    <li class="nav-item">
                                        <a href="{{ route('company-type') }}" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Company Type</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('company-list')
                                    <li class="nav-item">
                                        <a href="{{ route('company') }}" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Company</p>
                                        </a>
                                    </li>
                                @endcan
                            @endif
                            @can('role-list')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link">
                                        <i class="fas fa-user-tag nav-icon"></i>
                                        <p>Role</p>
                                    </a>
                                </li>
                            @endcan
                            @can('user-list')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['counsel-list', 'chamber-staff-list', 'chamber-list', 'internal-counsel-list'])
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Counsel/Lawyer
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @canany(['counsel-list', 'chamber-staff-list', 'chamber-list'])
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            External Counsel
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('counsel-list')
                                            <li class="nav-item">
                                                <a href="{{ route('counsel') }}" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Counsel</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('chamber-staff-list')
                                            <li class="nav-item">
                                                <a href="{{ route('chamber-staff') }}" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Chamber Staff</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('chamber-list')
                                            <li class="nav-item">
                                                <a href="{{ route('chamber') }}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Chamber</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcanany
                            @can('internal-counsel-list')
                                <li class="nav-item">
                                    <a href="{{ route('internal-counsel') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Internal Counsel</p>
                                    </a>
                                </li>
                        </li>
                    @endcan
                </ul>
                </li>
            @endcanany
            @canany([
                'accused-list',
                'allegation-claim-list',
                'area-list',
                'area-list',
                'bank-list',
                'bank-branch-list',
                'bill-type-list',
                'bill-particulars-list',
                'bill-schedule-list',
                'branch-list',
                'cabinet-list',
                'case-status-list',
                'case-title-list',
                'case-category-list',
                'case-matter-list',
                'case-type-list',
                'client-group-list',
                'client-name-list',
                'client-which-party-list',
                'complainant-list',
                'coordinator-or-tadbirkar-list',
                'court-name-list',
                'court-order-list',
                'court-proceeding-list',
                'day-notes-list',
                'designation-list',
                'documents-list',
                'documents-type-list',
                'external-council-list',
                'internal-council-list',
                'in-favour-of-list',
                'law-list',
                'legal-issue-list',
                'legal-service-list',
                'mode-of-received-list',
                'next-date-fixed-for-list',
                'next-day-presence-list',
                'opposition-which-party-list',
                'particulars-list',
                'party-category-list',
                'party-subcategory-list',
                'payment-type-list',
                'payment-mode-list',
                'profession-list',
                'program-list',
                'progress-list',
                'referrer-list',
                'section-list',
                'title-list',
                'zone-list',
                'floor-list',
                'flat-number-list',
                'property-type-list',
                'seller-or-buyer-list',
                'compliance-category-list',
                'compliance-type-list',
                'company-type-list',
                'company-list',
                ])
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Admin Setup
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @canany([
                                'accused-list',
                                'allegation-claim-list',
                                'area-list',
                                'area-list',
                                'bank-list',
                                'bank-branch-list',
                                'bill-type-list',
                                'bill-particulars-list',
                                'bill-schedule-list',
                                'branch-list',
                                'cabinet-list',
                                'case-status-list',
                                'case-title-list',
                                'case-category-list',
                                'case-matter-list',
                                'case-type-list',
                                'client-group-list',
                                'client-name-list',
                                'client-which-party-list',
                                'complainant-list',
                                'coordinator-or-tadbirkar-list',
                                'court-name-list',
                                'court-order-list',
                                'court-proceeding-list',
                                'day-notes-list',
                                'designation-list',
                                'documents-list',
                                'documents-type-list',
                                'external-council-list',
                                'internal-council-list',
                                'in-favour-of-list',
                                'law-list',
                                'legal-issue-list',
                                'legal-service-list',
                                'mode-of-received-list',
                                'next-date-fixed-for-list',
                                'next-day-presence-list',
                                'opposition-which-party-list',
                                'particulars-list',
                                'party-category-list',
                                'party-subcategory-list',
                                'payment-type-list',
                                'payment-mode-list',
                                'profession-list',
                                'program-list',
                                'progress-list',
                                'referrer-list',
                                'section-list',
                                'title-list',
                                'zone-list',
                                ])
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Litigation Setup
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('accused-list')
                                        <li class="nav-item">
                                            <a href="{{ route('accused') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Accused</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('allegation-claim-list')
                                        <li class="nav-item">
                                            <a href="{{ route('allegation') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Allegation/Claim</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('area-list')
                                        <li class="nav-item">
                                            <a href="{{ route('area') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Area</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('bank-list')
                                        <li class="nav-item">
                                            <a href="{{ route('bank') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Bank</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('bank-branch-list')
                                        <li class="nav-item">
                                            <a href="{{ route('bank-branch') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Bank Branch</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('bill-type-list')
                                        <li class="nav-item">
                                            <a href="{{ route('bill-type') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Bill Type</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('bill-particulars-list')
                                        <li class="nav-item">
                                            <a href="{{ route('bill-particulars') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Bill Particulars</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('bill-schedule-list')
                                        <li class="nav-item">
                                            <a href="{{ route('bill-schedule') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Bill Schedule</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('branch-list')
                                        <li class="nav-item">
                                            <a href="{{ route('branch') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Branch</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('cabinet-list')
                                        <li class="nav-item">
                                            <a href="{{ route('cabinet') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Cabinet </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('case-status-list')
                                        <li class="nav-item">
                                            <a href="{{ route('case-status') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Case Status </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('case-title-list')
                                        <li class="nav-item">
                                            <a href="{{ route('case-title') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Case Title</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('case-category-list')
                                        <li class="nav-item">
                                            <a href="{{ route('case-category') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Case Category</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('case-matter-list')
                                        <li class="nav-item">
                                            <a href="{{ route('matter') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Case Matter</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('case-type-list')
                                        <li class="nav-item">
                                            <a href="{{ route('case-types') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Case Type</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('client-group-list')
                                        <li class="nav-item">
                                            <a href="{{ route('group') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Client Group</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('client-name-list')
                                        <li class="nav-item">
                                            <a href="{{ route('client-name') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Client Name</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('client-which-party-list')
                                        <li class="nav-item">
                                            <a href="{{ route('client') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Client(Which Party)</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('complainant-list')
                                        <li class="nav-item">
                                            <a href="{{ route('complainant') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Complainant</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('coordinator-or-tadbirkar-list')
                                        <li class="nav-item">
                                            <a href="{{ route('coordinator') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Coordinator/Tadbirkar</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('court-name-list')
                                        <li class="nav-item">
                                            <a href="{{ route('court') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Court Name</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('court-order-list')
                                        <li class="nav-item">
                                            <a href="{{ route('court-last-order') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Court Order</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('court-proceeding-list')
                                        <li class="nav-item">
                                            <a href="{{ route('court-proceeding') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Court Proceeding</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('day-notes-list')
                                        <li class="nav-item">
                                            <a href="{{ route('day-notes') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Day Notes</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('designation-list')
                                        <li class="nav-item">
                                            <a href="{{ route('designation') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Designation</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('documents-list')
                                        <li class="nav-item">
                                            <a href="{{ route('documents-setup') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Documents</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('documents-type-list')
                                        <li class="nav-item">
                                            <a href="{{ route('documents-type') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Documents Type</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('external-council-list')
                                        <li class="nav-item">
                                            <a href="{{ route('external-council') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>External Counsel</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('internal-council-list')
                                        <li class="nav-item">
                                            <a href="{{ route('internal-council') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Internal Counsel</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('in-favour-of-list')
                                        <li class="nav-item">
                                            <a href="{{ route('in-favour-of') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>In favour of</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('law-list')
                                        <li class="nav-item">
                                            <a href="{{ route('law') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Law</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('legal-issue-list')
                                        <li class="nav-item">
                                            <a href="{{ route('legal-issue') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Legal Issue</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('legal-service-list')
                                        <li class="nav-item">
                                            <a href="{{ route('legal-service') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Legal Service</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('mode-of-received-list')
                                        <li class="nav-item">
                                            <a href="{{ route('mode') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Mode of received</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('next-date-fixed-for-list')
                                        <li class="nav-item">
                                            <a href="{{ route('next-date-reason') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Next date fixed for</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('next-day-presence-list')
                                        <li class="nav-item">
                                            <a href="{{ route('next-day-presence') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Next Day Presence</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('opposition-which-party-list')
                                        <li class="nav-item">
                                            <a href="{{ route('opposition') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Opposition(Which Party)</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('particulars-list')
                                        <li class="nav-item">
                                            <a href="{{ route('particulars') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Particulars</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('party-category-list')
                                        <li class="nav-item">
                                            <a href="{{ route('client-category') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Party Category</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('party-subcategory-list')
                                        <li class="nav-item">
                                            <a href="{{ route('client-subcategory') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Party Subcategory</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('payment-type-list')
                                        <li class="nav-item">
                                            <a href="{{ route('digital-payment-type') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Payment Type</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('payment-mode-list')
                                        <li class="nav-item">
                                            <a href="{{ route('payment-mode') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Payment Mode</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('profession-list')
                                        <li class="nav-item">
                                            <a href="{{ route('profession') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Profession</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('program-list')
                                        <li class="nav-item">
                                            <a href="{{ route('program') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Program</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('progress-list')
                                        <li class="nav-item">
                                            <a href="{{ route('progress') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Progress</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('referrer-list')
                                        <li class="nav-item">
                                            <a href="{{ route('referrer') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Referrer</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('section-list')
                                        <li class="nav-item">
                                            <a href="{{ route('section') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Section</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('title-list')
                                        <li class="nav-item">
                                            <a href="{{ route('person-title') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Title</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('zone-list')
                                        <li class="nav-item">
                                            <a href="{{ route('region') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Zone</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @canany(['division-list', 'district-list', 'thana-list'])
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>
                                                    Map Info
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                @can('division-list')
                                                    <li class="nav-item">
                                                        <a href="{{ route('division') }}" class="nav-link">
                                                            <i class="far fa-dot-circle nav-icon"></i>
                                                            <p>Division</p>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('district-list')
                                                    <li class="nav-item">
                                                        <a href="{{ route('district') }}" class="nav-link">
                                                            <i class="far fa-dot-circle nav-icon"></i>
                                                            <p>District</p>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('thana-list')
                                                    <li class="nav-item">
                                                        <a href="{{ route('thana') }}" class="nav-link">
                                                            <i class="far fa-dot-circle nav-icon"></i>
                                                            <p>Thana</p>
                                                        </a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </li>
                                    @endcanany
                                </ul>
                            @endcanany
                        </li>
                        @canany(['floor-list', 'flat-number-list', 'property-type-list', 'seller-or-buyer-list'])
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Property Setup
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('floor-list')
                                        <li class="nav-item">
                                            <a href="{{ route('floor') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Floor</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('flat-number-list')
                                        <li class="nav-item">
                                            <a href="{{ route('flat-number') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Flat Number</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('property-type-list')
                                        <li class="nav-item">
                                            <a href="{{ route('property-type') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Property Type</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('seller-or-buyer-list')
                                        <li class="nav-item">
                                            <a href="{{ route('seller-buyer') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Seller/Buyer</p>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanany

                        @canany(['compliance-category-list', 'compliance-type-list'])
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Compliance Setup
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">


                                    @can('compliance-category-list')
                                        <li class="nav-item">
                                            <a href="{{ route('compliance-category') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Compliance Category</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('compliance-type-list')
                                        <li class="nav-item">
                                            <a href="{{ route('compliance-type') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Compliance Type</p>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanany

                        {{--                            @canany(['company-type-list', 'company-list']) --}}
                        {{--                                <li class="nav-item"> --}}
                        {{--                                    <a href="#" class="nav-link"> --}}
                        {{--                                        <i class="far fa-circle nav-icon"></i> --}}
                        {{--                                        <p> --}}
                        {{--                                            User Profile --}}
                        {{--                                            <i class="right fas fa-angle-left"></i> --}}
                        {{--                                        </p> --}}
                        {{--                                    </a> --}}
                        {{--                                    <ul class="nav nav-treeview"> --}}
                        {{--                                        @can('company-type-list') --}}
                        {{--                                            <li class="nav-item"> --}}
                        {{--                                                <a href="{{ route('company-type') }}" class="nav-link"> --}}
                        {{--                                                    <i class="far fa-dot-circle nav-icon"></i> --}}
                        {{--                                                    <p>Company Type</p> --}}
                        {{--                                                </a> --}}
                        {{--                                            </li> --}}
                        {{--                                        @endcan --}}
                        {{--                                        @can('company-list') --}}
                        {{--                                            <li class="nav-item"> --}}
                        {{--                                                <a href="{{ route('company') }}" class="nav-link"> --}}
                        {{--                                                    <i class="far fa-dot-circle nav-icon"></i> --}}
                        {{--                                                    <p>Company</p> --}}
                        {{--                                                </a> --}}
                        {{--                                            </li> --}}
                        {{--                                        @endcan --}}
                        {{--                                    </ul> --}}
                        {{--                                </li> --}}
                        {{--                            @endcanany --}}
                    </ul>
                </li>
            @endcanany

            @canany(['civil-cases-list', 'criminal-cases-list', 'service-matter-list', 'quassi-judicial-cases-list',
                'high-court-cases-list', 'appellate-court-cases-list', 'search-wizard-list', 'billing-list'])
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Litigation Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
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
                                            <a href="{{ route('quassi-judicial-cases') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Special Court</p>
                                            </a>
                                        </li>
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
                                            <p>Appellate Court Division</p>
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
                                </ul>
                            </li>
                        @endcanany
                        @canany(['search-wizard-list'])
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Search Wizard
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                @can('search-wizard-list')
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('search-case-pages') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Search Cases</p>
                                            </a>
                                        </li>
                                    </ul>
                                @endcan
                            </li>
                        @endcanany
                        @canany(['billing-list'])
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Billing
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                @can('billing-list')
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('billing') }}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Billing</p>
                                            </a>
                                        </li>
                                    </ul>
                                @endcan
                            </li>
                        @endcanany

                    </ul>
                </li>
            @endcanany
            @canany(['land-information-list', 'flat-information-list'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-couch nav-icon"></i>
                        <p>
                            Property Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('land-information-list')
                            <li class="nav-item">
                                <a href="{{ route('land-information') }}" class="nav-link">
                                    <i class="ml-left"></i>
                                    <p>Land Information</p>
                                </a>
                            </li>
                        @endcan
                        @can('flat-information-list')
                            <li class="nav-item">
                                <a href="{{ route('flat-information') }}" class="nav-link">
                                    <i class="ml-left"></i>
                                    <p>Flat Information</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['regulatory-compliance-info-list', 'social-compliance-info-list'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-print nav-icon"></i>
                        <p>
                            Compliance Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('regulatory-compliance-info-list')
                            <li class="nav-item">
                                <a href="{{ route('regulatory-compliance') }}" class="nav-link">
                                    <i class="ml-left"></i>
                                    <p> Regulatory Compliance Info </p>
                                </a>
                            </li>
                        @endcan
                        @can('social-compliance-info-list')
                            <li class="nav-item">
                                <a href="{{ route('social-compliance') }}" class="nav-link">
                                    <i class="ml-left"></i>
                                    <p>Social Compliance</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            {{-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-hammer nav-icon"></i>
                        <p>
                            Legal Services Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li> --}}
            @canany(['document-management-list', 'external-document-list'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-archive nav-icon"></i>
                        <p>
                            Document Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('document-management-list')
                            <li class="nav-item">
                                <a href="{{ route('document-management') }}" class="nav-link">
                                    <i class="ml-left"></i>
                                    <p> Document Management </p>
                                </a>
                            </li>
                        @endcan
                        @can('external-document-list')
                            <li class="nav-item">
                                <a href="{{ route('external-document') }}" class="nav-link">
                                    <i class="ml-left"></i>
                                    <p>External Document</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-file nav-icon"></i>
                    <p>
                        Report Managenent
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('litigation.report') }}" class="nav-link">
                            <i class="ml-left"></i>
                            <p>Litigation Summary & Report</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>
                        HR Managenent
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#!" class="nav-link">
                            <i class="ml-left"></i>
                            <p>HR Managenent</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-balance-scale nav-icon"></i>
                    <p>
                        Accounts Managenent
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#!" class="nav-link">
                            <i class="ml-left"></i>
                            <p>Accounts Managenent</p>
                        </a>
                    </li>
                </ul>
            </li>


            {{-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-hammer nav-icon"></i>
                        <p>
                            Legal Services Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>

                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="fa fa-gavel nav-icon"></i>
                          <p>
                              HR Management
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                  </li>

                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="fas fa-hammer nav-icon"></i>
                          <p>
                              Account Management
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="fas fa-hammer nav-icon"></i>
                          <p>
                              MIS
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                  </li> --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
