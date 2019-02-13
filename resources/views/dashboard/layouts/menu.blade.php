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

                <li aria-haspopup="true">
                    <a href="{{route('order.index')}}"> <i class="fa fa-opencart"></i> ابدا البيع
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
                    <a href="javascript:;"> <i class="fa fa-plus-square"></i> الأصناف
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('item.index')}}" class="nav-link  ">
                                <i class="icon-docs"></i> عرض الأصناف
                                <span class="badge badge-success">{{\App\Item::count()}}</span>
                            </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('item.create')}}" class="nav-link  "><i class="icon-plus"></i> اضافة صنف جديد </a>
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

                <li aria-haspopup="true" class="">
                    <a data-toggle="modal" data-target="#daily_report" ><i class="icon-home"></i>تقرير مبيعات يومية
                        <span class="arrow"></span>
                    </a>

                </li>

                <div id="daily_report" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">حذف الحجم</h4>
                            </div>
                            {!!Form::open(['route'=>['daily_report'],'method'=>'get','files'=>'true'])!!}
                            <div class="modal-body">
                                <div class="form-group col-md-6  {{ $errors->has('name') ? ' has-error' : 'has-success' }} ">
                                    <label for="form_control_1">التاريخ</label>
                                    {!!Form::date('date',old('date'),['class'=>'form-control','autocomplete'=>'off'])!!}
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-success">تصفية</button>

                                <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </ul>
        </div>
        <!-- END MEGA MENU -->
    </div>
</div>

<!-- END HEADER MENU -->
