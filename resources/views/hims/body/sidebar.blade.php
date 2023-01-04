 <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                        @can('is-emergency')
                         <li class="menu-title">ED Management</li>
                            <li>
                                <a href="{{ url('/') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Home</span>
                                </a>
                            </li>
                         <li>
                                <a href="{{ url('/emergency/dashboard') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/emergency/patient') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Patients</span>
                                </a>
                            </li>
                            <li class="menu-title">OP Management</li>
                            <li>
                                <a href="{{ url('/emergency/visit') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Triage</span>
                                </a>
                            </li>
                            <li class="menu-title">IM Management</li>
                            <li>
                                <a href="{{ url('/emergency/Resus/') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Resus</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/emergency/acute/') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Acute</span>
                                </a>
                            </li>

                            <li class="menu-title">Transfer Requests</li>
                            <li>
                                <a href="{{ url('/emergency/admission/requestList/') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Out-going Request</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/emergency/admission/IncomingRequestList/') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">In-Coming Request</span>
                                </a>
                            </li>   
                            @endcan

                            @can('is-internalmedicine')
                            <li class="menu-title">IM Management</li>
                            <li>
                                <a href="{{ url('/') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/internalmedicine/dashboard') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/internal_medicine/patient') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Patients</span>
                                </a>
                            </li> 
                            <li class="menu-title">OP Management</li>

                            <li>
                                <a href="{{ url('/internal_medicine/TB') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">TB</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/internal_medicine/diabetic') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Diabetic Clinic</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/internal_medicine/oncology') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Oncology</span>
                                </a>
                            </li>
                            <li class="menu-title">IP Management</li> 
                            <li>
                                <a href="{{ url('/internal_medicine/medical/list') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Medical</span>
                                </a>
                            </li> 
                             <li class="menu-title">Transfer requests</li>
                             <li>
                                <a href="{{ url('/internal_medicine/admission/OutgoingRequestList/') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Out-going Request</span>
                                </a>
                            </li>                             
                            <li>
                                <a href="{{ url('/internal_medicine/admission/requestList/') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">In-Coming Request</span>
                                </a>
                            </li>                   
                            @endcan

                            @can('is-lab')
                            <li class="menu-title">Lab Management</li>
                            <li>
                                <a href="{{ url('lab/dashboard') }}" class="waves-effe">
                                    <i class="ri-dashboard-line" id="projectlink1"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span id="projectlink2">Dashboard</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>