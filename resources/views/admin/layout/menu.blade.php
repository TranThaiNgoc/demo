 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="fas fa-bars"></i></span> <span class="hide-menu">Navigation</span></h3>
        </div>
        <ul class="nav" id="side-menu">
            <li style="padding: 70px 0 0;">
                {{-- <a href="{{ url('/bu/list') }}" class="waves-effect"><i class="fa fa-home fa-fw" aria-hidden="true"></i>@lang('home.Home')</a> --}}
            </li>
            <li>
            <a class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>BU</a>
                <ul style="list-style-type: none" id="side-menu">
                    <li>
                        <a href="{{ route('bu.list') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - BU list</a>
                    </li>                       
                </ul>
            </li>
            <li>
                <a class="waves-effect"><i class="fa fa fa-cogs fa-fw" aria-hidden="true"></i>@lang('Setting')</a>
                <ul style="list-style-type: none" id="side-menu">
                    <li>
                        <a href="{{ route('admin.bucategory.list') }}"  class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - BU Category</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.procategory.list') }}"  class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Produce Category</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.prolinecategory.list') }}"  class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Produce line Category</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.costcategory.list') }}"  class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Cost Category</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.renvenuecategory.list') }}"  class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Revenue Category</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.itemcategory.list') }}"  class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Item Category</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.unit.list') }}"  class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Unit</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.status.list') }}"  class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Status</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- ============================================================== -->
        <!-- End Left Sidebar -->