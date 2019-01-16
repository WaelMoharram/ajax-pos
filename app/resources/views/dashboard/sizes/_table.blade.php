<div class="portlet-body">
    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="all  text-center">الاسم</th>
            <th class="text-center">السعر</th>
            <th class="text-center col-sm-3" >الاعدادات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sizes as $size)
            <tr>
                <td>{!!$size->name!!}</td>
                <td>{!!$size->price!!}</td>
                <td class="text-center">
                    <div class="mt-action-buttons">
                        <div class="btn-group">
                            <a data-toggle="modal" data-target="#delete{{$size->id}}" class="btn btn-outline red btn-sm"><i class="fa fa-trash"></i>حذف</a>
                        </div>
                    </div>
                </td>
            </tr>
            <div id="delete{{$size->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">حذف الحجم</h4>
                        </div>
                        <div class="modal-body">
                            <p>هل أنت متأكد من حذف الحجم {{$size->name}} ؟</p>
                        </div>
                        <div class="modal-footer">
                            {!!Form::open(['route'=>['delete_size'],'method'=>'get','files'=>'true'])!!}
                            {!! Form::hidden('id',$size->id) !!}
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
