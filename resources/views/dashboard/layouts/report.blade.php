@extends('dashboard.layouts.layout')
@section('title')"تقرير صافى العمليات" @endsection
@section('address')
    {{ date('Y-m_d') }}
@endsection
@section('header')
    <link href="{!!asset('assets')!!}/pages/css/invoice-rtl.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="invoice">
        <div class="row invoice-logo">
            <div class="col-xs-12 invoice-logo-space text-center">
                <img src="{!!asset('logo.png')!!}" class="img-responsive" alt="مكتب الايمان للهندسة و المقاولات" style="height: 125px!important;margin: 0 auto;"/>
                <h2>مكتب الايمان للهندسة و المقاولات</h2>
                <br>
                <br>
                <h3>تقرير صافى العمليات حتى   {{date('d/m/Y')}}
                </h3>
            </div>

        </div>
        <hr/>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center"> # </th>
                        <th class="text-center">العملية</th>
                        <th class="text-center">اجمالى الايراد</th>
                        <th class="text-center">اجمالى المصروفات</th>
                        <th class="text-center">الصافى</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($total2 = 0)
                    @php($count = 1)
                    @foreach($projects as $project)
                        <tr>
                            <td class="text-center">{!! $count !!}</td>
                            <td class="text-center">{!!$project->name!!}</td>
                            <td class="text-center">{!!$project->incomes_expenses->where('type','income')->sum('total')!!}</td>
                            <td class="text-center">{!!$project->incomes_expenses->where('type','expense')->sum('total')!!}</td>
                            <td class="text-center">{!!$project->incomes_expenses()->where('type','income')->sum('total') - $project->incomes_expenses()->where('type','expense')->sum('total')!!}</td>
                        </tr>
                        @php($count ++)
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                {{--<div class="well">--}}
                {{--<address>--}}
                {{--<strong>Loop, Inc.</strong>--}}
                {{--<br/> 795 Park Ave, Suite 120--}}
                {{--<br/> San Francisco, CA 94107--}}
                {{--<br/>--}}
                {{--<abbr title="Phone">P:</abbr> (234) 145-1810 </address>--}}
                {{--<address>--}}
                {{--<strong>Full Name</strong>--}}
                {{--<br/>--}}
                {{--<a href="mailto:#"> first.last@email.com </a>--}}
                {{--</address>--}}
                {{--</div>--}}
            </div>
            <div class="col-xs-8 invoice-block">
                <ul class="list-unstyled amounts">
                    {{--<li>--}}
                    {{--<strong>Sub - Total amount:</strong> $9265 </li>--}}
                    {{--<li>--}}
                    {{--<strong>Discount:</strong> 12.9% </li>--}}
                    {{--<li>--}}
                    {{--<strong>VAT:</strong> ----- </li>--}}
                    {{--<li>--}}
                </ul>
                <br/>
                <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                    <i class="fa fa-print"></i>
                </a>

            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{!!asset('assets')!!}/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="{!!asset('assets')!!}/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script>
        $('.date-picker').datepicker({
            format: 'yyyy-mm-dd',
            rtl: false,
            orientation: "left",
            autoclose: true
        });
    </script>
@endsection


