<div class="form-body">
    {!! Form::hidden('item_id',$id) !!}
    <div class="form-group col-md-6  {{ $errors->has('name') ? ' has-error' : 'has-success' }} ">
        <label for="form_control_1">اسم الحجم</label>
        {!!Form::text('name',old('name'),['class'=>'form-control','autocomplete'=>'off'])!!}
    </div>

    <div class="form-group col-md-6  {{ $errors->has('price') ? ' has-error' : 'has-success' }} ">
        <label for="form_control_1">السعر</label>
        {!!Form::number('price',old('price'),['class'=>'form-control','autocomplete'=>'off','step'=>'any'])!!}
    </div>

    <div class="clearfix"></div>
</div>
<div class="form-actions noborder">
    <button type="submit" class="btn blue">حفظ</button>
    <button type="reset" class="btn default" onclick="window.history.back();">الغاء</button>
</div>
