 <!-- ============================================================== -->
        <aside  class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div style="background-color:#010F21;" class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul style="background-color:#010F21;" id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route ('index')}}" aria-expanded="false">
                                <i style="font-size:17px;"class="fas fa-home"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link" href="{{ route ('suppliers.view')}}">
                                <i style="font-size:17px;" class="fas fa-parachute-box"></i>

                                <span class="hide-menu"> Suppliers </span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link" href="{{ route ('categories.view')}}">
                                <i style="font-size:17px;" class="mdi mdi-view-dashboard"></i>

                                <span class="hide-menu"> Categorys </span>
                            </a>
                        </li>
                       <li class="sidebar-item"> 
                            <a class="sidebar-link" href="{{ route ('products.view')}}">
                                <i style="font-size:17px;" class="fas fa-tags"></i>

                                <span class="hide-menu"> Products </span>
                            </a>
                        </li>
                         <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i style="font-size:17px;" class="fas fa-copyright"></i>
                                <span class="hide-menu"> Logo & Favicon</span>
                            </a>
                            <ul style="background-color:#000000;" aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route ('logos.view')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">Logo</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route ('favicons.view')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">Favicon </span>
                                    </a>
                                </li> 
                            </ul>
                        </li>
                         <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i style="font-size:17px;" class="fas fa-users"></i>
                                <span class="hide-menu"> Customer Mannage</span>
                            </a>
                            <ul style="background-color:#000000;"  aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route ('customers.view')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">  View Customer </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route ('crdit.customers')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">  Crdit Customer </span>
                                    </a>
                                </li> 
                                <li class="sidebar-item">
                                    <a href="{{ route ('paid.customers')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu"> Paid Customer </span>
                                    </a>
                                </li>  
                            </ul>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i style="font-size:17px;" class="fas fa-store"></i>
                                <span class="hide-menu">Purchase Mannage</span>
                            </a>
                            <ul style="background-color:#000000;"  aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route ('purchases.view')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">  View Purchase </span>
                                </a>
                            </li>
                                <li class="sidebar-item">
                                    <a href="{{ route ('purchases.approval.list')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">  Approval Purchase </span>
                                </a>
                            </ul>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i style="font-size:17px;"class="fas fa-file-invoice-dollar"></i>
                                <span class="hide-menu"> Invoice Mannage</span>
                            </a>
                            <ul style="background-color:#000000;"  aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route ('invoices.view')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">  Invoice View </span>
                                </a>
                            </li>
                                <li class="sidebar-item">
                                    <a href="{{ route ('invoices.pending.list')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">  Invoice Approve </span>
                                </a>
                            </li>
                                <li class="sidebar-item">
                                    <a href="{{ route ('invoice.print.list')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu"> Print Invoice </span>
                                </a>
                            </li>
                                <li class="sidebar-item">
                                    <a href="{{ route ('daily.invoice.report')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">Daily Invoice Report </span>
                                </a>
                            </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i style="font-size:17px;"class="fas fa-layer-group"></i>
                                <span class="hide-menu">Stock Mannage </span>
                            </a>
                            <ul style="background-color:#000000;"  aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route ('stocks.report')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">  Stock Report </span>
                                </a>
                                </li>
                            <li class="sidebar-item">
                                    <a href="{{ route ('supplier.product.wise')}}" class="sidebar-link">
                                    <i class="mdi mdi-note-outline"></i>
                                    <span class="hide-menu">  Supplier/Product Wise Report </span>
                                </a>
                                </li>
                            </ul>
                        </li>
                       <li class="sidebar-item"> 
                            <a class="sidebar-link" href="{{ route ('settings.view')}}">
                                <i style="font-size:17px;" class="fas fa-cog"></i>

                                <span class="hide-menu"> Setting </span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>