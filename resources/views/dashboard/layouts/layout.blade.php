<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>{!! env('APP_NAME') !!} | @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin RTL Theme #3 for " name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{!!asset('assets')!!}/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('assets')!!}/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('assets')!!}/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{!!asset('assets')!!}/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- datepicker3 css-->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{!!asset('assets')!!}/global/css/components-rounded-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{!!asset('assets')!!}/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{!!asset('assets')!!}/layouts/layout3/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
    {{--<link href="{!!asset('assets')!!}/layouts/layout3/css/themes/default-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />--}}
    <link href="{!!asset('assets')!!}/layouts/layout3/css/themes/yellow-orange-rtl.min.css" rel="stylesheet" type="text/css" id="style_color">
    <link href="{!!asset('assets')!!}/layouts/layout3/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{!!asset('favicon.ico')!!}" />
    @yield('header')
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid">
<div class="page-wrapper">
    <div class="page-wrapper-row">
        <div class="page-wrapper-top">
            <!-- BEGIN HEADER -->
            <div class="page-header">
                <!-- BEGIN HEADER TOP -->
                <div class="page-header-top">
                    <div class="container">
                        <!-- BEGIN LOGO -->
                        <div class="page-logo">

                                <h1>{!! env('APP_NAME') !!}</h1>

                        </div>
                        <!-- END LOGO -->
                        <a href="javascript:;" class="menu-toggler"></a>
                        @include('dashboard.layouts.navbar')
                    </div>
                </div>
                <!-- END HEADER TOP -->
                @include('dashboard.layouts.menu')
            </div>
            <!-- END HEADER -->
        </div>
    </div>
    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <div class="container">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>@yield('address')</h1>
                            </div>
                            <!-- END PAGE TITLE -->

                        </div>
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE CONTENT BODY -->
                    <div class="page-content">

                        <div class="container">

                            <!-- BEGIN PAGE CONTENT INNER -->
                            @include('flash::message')
                            <div class="page-content-inner">
                                @yield('content')
                            </div>
                            <!-- END PAGE CONTENT INNER -->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT BODY -->
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
        </div>
    </div>
    <div class="page-wrapper-row">
        <div class="page-wrapper-bottom">
            <!-- BEGIN FOOTER -->
            <!-- BEGIN INNER FOOTER -->
            <div class="page-footer">
                <div class="container"> {!! date('Y') !!} &copy; {!! env('APP_NAME') !!} By
                    <a target="_blank" href="#">Rivers</a>
                </div>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up hidden-print"></i>
            </div>
            <!-- END INNER FOOTER -->
            <!-- END FOOTER -->
        </div>
    </div>
</div>

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
@yield('footer')
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{!!asset('assets')!!}/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{!!asset('assets')!!}/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="{!!asset('assets')!!}/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="{!!asset('assets')!!}/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="{!!asset('assets')!!}/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
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
<script>
    $('#group_id').on('change', function () {
        console.log(11+$('#group_id').val());
        $.ajax({
            url: '{{url('expense_select_project')}}' + '/' + $('#group_id').val(),
            type: 'GET',
            success: function (data) {
                console.log(data);
                $('#item_id').children().remove();
                $.each(data.data, function (e) {
                    $('#item_id').append('<option value="' + data.data[e].id + '">' + data.data[e].name + '</option>');
                });
            }
        })

    });
</script>

<script>
    $('#amount').on('change', function () {
        var ppl_total = $('#ppl_total').val();

        var incomes = $('#incomes').val();

        var amount = $('#amount').val();

        var unit_price = $('#unit_price').val();

        var paid = amount * unit_price;

        var remind = ppl_total - incomes - paid;

        $('#paid').val(paid);

        $('#remind').val(remind);

    });

    $('#unit_price').on('change', function () {
        var ppl_total = $('#ppl_total').val();

        var incomes = $('#incomes').val();

        var amount = $('#amount').val();

        var unit_price = $('#unit_price').val();

        var paid = amount * unit_price;

        var remind = ppl_total - incomes - paid;

        $('#paid').val(paid);

        $('#remind').val(remind);

    });

    $('#ppl_total').on('change', function () {
        var ppl_total = $('#ppl_total').val();

        var incomes = $('#incomes').val();

        var amount = $('#amount').val();

        var unit_price = $('#unit_price').val();

        var paid = amount * unit_price;

        var remind = ppl_total - incomes - paid;

        $('#paid').val(paid);

        $('#remind').val(remind);

    });
</script>

</body>

</html>
