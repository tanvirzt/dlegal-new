<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
        <img src="{{ asset('images/admin_images/admin_profile/bclc logo 4.png')}}" alt="AdminLTE Logo"
             class="brand-image"
             style="opacity:1">
        <!-- <span style="font-size: 16px;" class="brand-text font-weight-light">BCLC</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                <!-- <img src="{{ asset('images/admin_images/admin_profile/'.Auth::guard('admin')->user()->image) }}"
                     class="img-circle elevation-2" alt="User Image"> -->

            </div>

            <div class="info">
                <a href="#"
                   class="d-block">{{ ucfirst(Auth::guard('admin')->user()->name) }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Setup
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('person-title') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Title</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('external-council') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>External Council</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('external-council-associates') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>External Council Associates</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('internal-council') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Internal Council</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('designation') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Designation</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('case_category') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Case Category</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('case-status') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Case Status </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('case-types') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Type of Cases</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('court') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Court Name</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('next-date-reason') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Reason for Next Date</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('court-last-order') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Last order of the Court</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('region') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Region</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('area') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Area</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('branch') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Branch</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('program') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Program</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('alligation') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Alligation</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('bill-type') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Bill Type</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('bank') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Bank</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('bank-branch') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Bank Branch</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('digital-payment-type') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Payment Type</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('seller-buyer') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Seller/Buyer</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    User Profile
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Individual Person</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Law Firm</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('company-type') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Company Type</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('company') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Company</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="{{ route('property-type') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Property Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('compliance-category') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compliance Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('compliance-type') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compliance Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('law-section') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Relevant Law/Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Map Info
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('division') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Division</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('district') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>District</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('thana') }}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Thana</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-couch nav-icon"></i>
                        <p>
                            Client Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ml-left"></i>
                                <p>Reports</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                      Litigation Management
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                          Cases
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('civil-cases') }}" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Civil</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('criminal-cases') }}" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Criminal</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('labour-cases') }}" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Labour Cases</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('quassi-judicial-cases') }}" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Special / Quassi-Judicial Cases</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('supreme-court-cases') }}" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Supreme Court of Bangladesh</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('high-court-cases') }}" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>High Court Division</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('appellate-court-cases') }}" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Appellate Court Division</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                          Billing
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('billing') }}" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Billing</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                          Reports
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Report 1</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Others</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-couch nav-icon"></i>
                        <p>
                            Property Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('land-information') }}" class="nav-link">
                                <i class="ml-left"></i>
                                <p>Land Information</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('flat-information') }}" class="nav-link">
                                <i class="ml-left"></i>
                                <p>Flat Information</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-print nav-icon"></i>
                        <p>
                            Compliance Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ml-left"></i>
                                <p> Regulatory Compliance Info </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ml-left"></i>
                                <p>Social Compliance</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-hammer nav-icon"></i>
                        <p>
                            Legal Services Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-hammer nav-icon"></i>
                        <p>
                            Dispute Resolution Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li> -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-line nav-icon"></i>
                        <p>
                            Documentation Management
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
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
