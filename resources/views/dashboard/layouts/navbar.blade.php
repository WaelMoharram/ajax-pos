<!-- BEGIN TOP NAVIGATION MENU -->
<div class="top-menu">
    <ul class="nav navbar-nav pull-right">

        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown dropdown-user dropdown-dark">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img alt="" class="img-circle" src="{!!asset('logo.png')!!}">
                <span class="username username-hide-mobile">{!!auth()->user()->username!!}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="icon-key"></i> تسجيل الخروج </a>
                        {!!Form::open(['id'=>'logout-form','route'=>['logout'],'method'=>'POST','files'=>'true','style'=>'display: none;'])!!}
                        {!! Form::close() !!}
                </li>
            </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
    </ul>
</div>
<!-- END TOP NAVIGATION MENU -->
