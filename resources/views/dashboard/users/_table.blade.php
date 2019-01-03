<div class="portlet-body">
    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="all  text-center">الاسم</th>
            <th class="text-center">الايميل</th>
            <th class="text-center">تاريخ الانشاء</th>
            <th class="text-center col-sm-2" >الاعدادات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{!!$user->username!!}</td>
                <td>{!!$user->email!!}</td>
                <td>{!!optional($user->created_at)->format('d-m-Y')!!}</td>
                <td class="text-center">
                    <div class="mt-action-buttons">
                        <div class="btn-group btn-group-circle">
                            <a href="{{route('user.edit',[$user->id])}}" class="btn btn-outline green btn-sm"><i class="fa fa-pencil"></i> تعديل</a>
                            <a data-toggle="modal" data-target="#delete{{$user->id}}" class="btn btn-outline red btn-sm"><i class="fa fa-trash"></i>حذف</a>
                        </div>
                    </div>
                </td>
            </tr>
            <div id="delete{{$user->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">حذف المستخدم</h4>
                        </div>
                        <div class="modal-body">
                            <p>هل أنت متأكد من حذف المستخدم {{$user->username}} ؟</p>
                        </div>
                        <div class="modal-footer">
                            {!!Form::open(['route'=>['user.destroy',$user->id],'method'=>'POST','files'=>'true'])!!}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">حذف</button>
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </tbody>
    </table>
</div>
