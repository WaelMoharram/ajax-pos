<!-- BEGIN HEADER MENU -->
<div class="page-header-menu">
    <div class="container">
        {{--<!-- BEGIN HEADER SEARCH BOX -->--}}
        {{--<form class="search-form" action="page_general_search.html" method="GET">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" class="form-control" placeholder="Search" name="query">--}}
                {{--<span class="input-group-btn">--}}
                                            {{--<a href="javascript:;" class="btn submit">--}}
                                                {{--<i class="icon-magnifier"></i>--}}
                                            {{--</a>--}}
                                        {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        {{--<!-- END HEADER SEARCH BOX -->--}}
        <!-- BEGIN MEGA MENU -->
        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
        <div class="hor-menu  ">
            <ul class="nav navbar-nav">
                <li aria-haspopup="true" class="active">
                    <a href="{{route('home')}}"> <i class="icon-home"></i>الرئيسية
                        <span class="arrow"></span>
                    </a>
                </li>

                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> <i class="fa fa-sitemap"></i> التصنيفات
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('category.index')}}" class="nav-link  ">
                                <i class="icon-docs"></i> عرض التصنيفات
                                <span class="badge badge-success">{{\App\Category::count()}}</span>
                            </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('category.create')}}" class="nav-link  "><i class="icon-plus"></i> اضافة تصنيف جديد </a>
                        </li>
                    </ul>
                </li>

                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> <i class="icon-users"></i> المستخدمين
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('user.index')}}" class="nav-link  ">
                                <i class="icon-docs"></i> عرض المستخدمين
                                <span class="badge badge-success">{{\App\User::count()}}</span>
                            </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('user.create')}}" class="nav-link  "><i class="icon-plus"></i> اضافة مستخدم جديد </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END MEGA MENU -->
    </div>
</div>

<!-- END HEADER MENU -->
