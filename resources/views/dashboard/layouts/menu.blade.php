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

                <li aria-haspopup="true" class="active">
                    <a href="{{route('report')}}"> <i class="icon-home"></i>تقرير صافى العمليات حتى اليوم
                        <span class="arrow"></span>
                    </a>
                </li>

                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> <i class="fa fa-money"></i> الايرادات و المصروفات
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('income_expense.create')}}" class="nav-link  "><i class="fa fa-sign-in"></i> اضافة ايرادات جديدة </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a  data-toggle="modal" data-target="#expense" class="nav-link  "><i class="fa fa-sign-out"></i> اضافة مصروفات جديدة </a>
                        </li>

                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('income_expense.index')}}" class="nav-link  ">
                                <i class="icon-docs"></i> عرض معاملات اليوم
                            </a>
                        </li>
                    </ul>
                </li>

                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> <i class="icon-globe"></i> العمليات
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('project.index')}}" class="nav-link  ">
                                <i class="icon-docs"></i> عرض العمليات
                                <span class="badge badge-success">{{\App\Project::count()}}</span>
                            </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('archive_index')}}" class="nav-link  ">
                                <i class="icon-docs"></i> عرض العمليات المؤرشفة
                                <span class="badge badge-success">{{\App\Project::onlyTrashed()->count()}}</span>
                            </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('project.create')}}" class="nav-link  "><i class="icon-plus"></i> اضافة عملية جديدة </a>
                        </li>
                    </ul>
                </li>

                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> <i class="icon-book-open"></i> العمالة
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('category.index')}}" class="nav-link  ">
                                <i class="icon-layers"></i> مجموعات العمالة
                                <span class="badge badge-success">{{\App\Category::count()}}</span>
                            </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('people.index')}}" class="nav-link  ">
                                <i class="icon-docs"></i> عرض العمالة
                                <span class="badge badge-success">{{\App\People::count()}}</span>
                            </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{route('people.create')}}" class="nav-link  "><i class="icon-plus"></i>اضافة متعامل جديد</a>
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
<div id="expense" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">اضافة مصروف جديد</h4>
            </div>
            {!!Form::open(['route'=>['income_expense.create'],'method'=>'get','class'=>''])!!}

            <div class="modal-body">
                <div class="form-group col-md-6  {{ $errors->has('project_id') ? ' has-error' : 'has-success' }} ">
                    <label for="form_control_1">اسم العملية</label>
                    {!! Form::select('project_id',[null=>'رجاء اختيار العملية'] +\App\Project::all()->pluck('name','id')->toArray(),old('project_id'),['id'=>'group_id','class'=>'form-control','autocomplete'=>'off','style'=>'width:100%!important;']) !!}
                </div>

                <div class="form-group col-md-6  {{ $errors->has('people_id') ? ' has-error' : 'has-success' }} ">
                    <label for="form_control_1">ليد</label>
                    {!! Form::select('people_id',[],old('people_id'),['id'=>'item_id','class'=>'form-control','autocomplete'=>'off','style'=>'width:100%!important;']) !!}
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">اضافة</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">تراجع</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<!-- END HEADER MENU -->
