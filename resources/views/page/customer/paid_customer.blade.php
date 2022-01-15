@extends('page.layouts.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Paid customer </h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Paid customer </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('paid.customers.pdf')}}" target="_blank"><button style="border-radius:4px;" type="submit" class="btn btn-primary"><i class="fa fa-download"></i> Download  PDF</button></a>
    </div>
</div>
<div style="padding:0px 20px;" class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-hover table-striped table-bordered">
                            <thead style="background-color:#5964FF; color: white;font-weight:200;">
                                <tr>
                                    <th>SL</th>
                                    <th>Customer Name</th>
                                    <th style="padding-right: 20px;">Invoice No</th>
                                    <th style="padding-right: 20px;">Date</th>
                                    <th>Amount</th>
                                    <th width="8%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                  $total_paid = '0';
                                @endphp
                                @foreach($allData as $key => $payment)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                    {{$payment['customer']['name']}}({{$payment['customer']['phone']}}-{{$payment['customer']['address']}})
                                    </td>
                                    <td>Invoice No #{{$payment['invoice']['invoice_no']}}</td>
                                    <td>{{date('d-m-Y',strtotime($payment['invoice']['date']))}}</td>
                                    <td>{{$payment->paid_amount}} TK</td>
                                    <td>
                                        <a style="border-radius:4px;" title="Details" href="{{route ('invoice.details.pdf',$payment->invoice_id)}}" class="btn btn-success" target="_blank"><i class="fa fa-eye"></i></a>
                                    </td>
                                    @php
                                    $total_paid += $payment->paid_amount;
                                    @endphp
                                </tr>
                                @endforeach
                                <tr>
                                    <td style="text-align:right;padding-right:10px; border-top: 1px solid #ddd;" colspan="4">Grand Total : </td>
                                    <td colspan="2" style="border-top:1px solid #ddd;">{{$total_paid}} TK</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#zero_config').DataTable();
</script>
@endsection