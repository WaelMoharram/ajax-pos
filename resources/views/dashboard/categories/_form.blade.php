<div class="form-body">
    <div class="form-group col-md-12  {{ $errors->has('name') ? ' has-error' : 'has-success' }} ">
        <label for="form_control_1">اسم التصنيف</label>
        {!!Form::text('name',old('name'),['class'=>'form-control','autocomplete'=>'off'])!!}
    </div>

    <div class="form-group col-md-12 {{ $errors->has('image') ? ' has-error' : 'has-success' }}">
        @if(isset($category->image))
            <img src="{!! url($category->image) !!}" width="100px">
        @endif
        <div class="clearfix"></div>
        <label for="form_control_1">الصوره</label>
        {!!Form::file('image',['class'=>'form-control'])!!}
    </div>

    <div class="form-group  col-md-12  {{ $errors->has('note') ? ' has-error' : 'has-success' }} ">
        <label for="form_control_1">ملاحظات</label>
        {!!Form::textarea('note',old('note'),['class'=>'form-control'])!!}

    </div>

    <div class="clearfix"></div>
</div>
<div class="form-actions noborder">
    <button type="submit" class="btn blue">حفظ</button>
    <button type="reset" class="btn default" onclick="window.history.back();">الغاء</button>
</div>
