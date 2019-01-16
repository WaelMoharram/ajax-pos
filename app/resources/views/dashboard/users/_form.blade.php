<div class="form-body">
    <div class="form-group col-md-12  {{ $errors->has('user') ? ' has-error' : 'has-success' }} ">
        <label for="form_control_1">إسم المستخدم</label>
        {!!Form::text('name',old('name'),['class'=>'form-control','autocomplete'=>'off'])!!}
    </div>
    <div class="form-group col-md-6 {{ $errors->has('password') ? ' has-error' : 'has-success' }}">
        <label for="form_control_1">كلمه المرور</label>
        {!!Form::password('password',['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : 'has-success' }}">
        <label for="form_control_1">تأكيد كلمه المرور</label>
        {!!Form::password('password_confirmation',['class'=>'form-control'])!!}
    </div>
    <div class="clearfix"></div>
</div>
<div class="form-actions noborder">
    <button type="submit" class="btn blue">حفظ</button>
    <button type="reset" class="btn default" onclick="window.history.back();">الغاء</button>
</div>
