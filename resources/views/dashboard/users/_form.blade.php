<div class="form-body">
    <div class="form-group col-md-6  {{ $errors->has('user') ? ' has-error' : 'has-success' }} ">
        <label for="form_control_1">إسم المستخدم</label>
        {!!Form::text('username',old('username'),['class'=>'form-control','autocomplete'=>'off'])!!}
    </div>
    <div class="form-group col-md-6 {{ $errors->has('email') ? ' has-error' : 'has-success' }}">
        <label for="form_control_1">البريد الالكترونى</label>
        {!!Form::text('email',old('email'),['class'=>'form-control','autocomplete'=>'off'])!!}
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
