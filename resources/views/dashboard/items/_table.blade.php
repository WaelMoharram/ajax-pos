<div class="portlet-body">
    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="all  text-center">الاسم</th>
            <th class="text-center">التصنيف</th>
            <th class="text-center">الصورة</th>
            <th class="text-center">السعر</th>
            <th class="text-center">ملاحظات</th>
            <th class="text-center col-sm-2" >الاعدادات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{!!$item->name!!}</td>
                <td>{!!optional($item->category)->name!!}</td>
                <td><img src="{!! url($item->image) !!}" width="100px"></td>
                <td>{!!$item->price!!} جنيه</td>
                <td>{!!$item->note!!}</td>
                <td class="text-center">
                    <div class="mt-action-buttons">
                        <div class="btn-group btn-group-circle">
                            <a href="{{route('item.edit',[$item->id])}}" class="btn btn-outline green btn-sm"><i class="fa fa-pencil"></i> تعديل</a>
                            <a data-toggle="modal" data-target="#delete{{$item->id}}" class="btn btn-outline red btn-sm"><i class="fa fa-trash"></i>حذف</a>
                        </div>
                    </div>
                </td>
            </tr>
            <div id="delete{{$item->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">حذف الصنف</h4>
                        </div>
                        <div class="modal-body">
                            <p>هل أنت متأكد من حذف الصنف {{$item->name}} ؟</p>
                        </div>
                        <div class="modal-footer">
                            {!!Form::open(['route'=>['item.destroy',$item->id],'method'=>'POST','files'=>'true'])!!}
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
