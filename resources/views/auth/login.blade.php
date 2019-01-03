<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>{!! env('APP_NAME') !!}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    {{--   <meta content="Preview page of Metronic Admin RTL Theme #4 for " name="description" />--}}
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{!!asset('assets')!!}/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('assets')!!}/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('assets')!!}/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('assets')!!}/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{!!asset('assets')!!}/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('assets')!!}/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{!!asset('assets')!!}/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{!!asset('assets')!!}/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{!!asset('assets')!!}/pages/css/login-rtl.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class=" login" style="background-color: #565656!important;">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="#">
        <img src="logo.png" style="width: 130px;" alt="{!! env('APP_NAME') !!}"/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <h3 class="form-title font-blue">تسجيل دخول</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>ادخل اسم المستخدم وكلمه المرور </span>
        </div>
        <div class="form-group
                 @if($errors->has('name')) has-error
                 @endif">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">اسم المستخدم</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="اسم المستخدم"  value="{{ old('name') }}" name="name" />
            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group @if($errors->has('password')) has-error @endif">
            <label class="control-label visible-ie8 visible-ie9">كلمه المرور</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"  value="{{old('password')}}" placeholder="كلمة المرور" name="password" />

            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif

        </div>
        <div class="login-form">
            <button type="submit" class="btn blue uppercase">دخول</button>
            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />تذكرنى
                <span></span>
            </label>
        </div>

    </form>

    <!-- END LOGIN FORM -->



</div>
<div class="copyright" style="color: #ffffff;!important;"> {!!date('Y')!!} © Rivers </div>
<!--[if lt IE 9]>
<script src="{!!asset('assets')!!}/global/plugins/respond.min.js"></script>
<script src="{!!asset('assets')!!}/global/plugins/excanvas.min.js"></script>
<script src="{!!asset('assets')!!}/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{!!asset('assets')!!}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{!!asset('assets')!!}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{!!asset('assets')!!}/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{!!asset('assets')!!}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{!!asset('assets')!!}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{!!asset('assets')!!}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{!!asset('assets')!!}/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{!!asset('assets')!!}/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="{!!asset('assets')!!}/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{!!asset('assets')!!}/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{!!asset('assets')!!}/pages/scripts/login.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function()
    {
        $('#clickmewow').click(function()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>
</body>

</html>
