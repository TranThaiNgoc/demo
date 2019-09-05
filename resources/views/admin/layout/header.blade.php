<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo">
                <!-- Logo icon image, you can use font-icon also --><b>
                    <!--This is dark logo icon-->
                    <img src="{{ asset('../plugins/images/admin-logo.png') }}" alt="home" class="dark-logo" />
                    <!--This is light logo icon-->
                    <img src="{{ asset('../plugins/images/admin-logo-dark.png') }}" alt="home" class="light-logo" />
                </b>
                <!-- Logo text image you can use text also --><span class="hidden-xs"
                    style="color:#54667a;font-weight:bold">
                    Finance System
                </span> </a>
        </div>
        <!-- /Logo -->
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
                @if(Auth::user()->lang == 'en')
                <a href="{{ url('vn/setlange') }}">VN</a>
                @endif
                @if(Auth::user()->lang == 'vn')
                <a href="{{ url('en/setlange') }}">EN</a>
                @endif
            </li>

            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            <li>
                <a class="profile-pic" href="{{ url('user/edit/'.Auth::user()->id) }}"> <img
                        src="{{ asset('../plugins/images/users/hai.png') }}" alt="user-img" width="36"
                        class="img-circle"><b class="hidden-xs">{{Auth::user()->name}}</b></a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
<!-- End Top Navigation -->