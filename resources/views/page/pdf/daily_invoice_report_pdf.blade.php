<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome PDF</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dist/pdf/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tbody>
                        <tr>
                            @php
                            $setting = App\Models\Setting::first();
                            @endphp
                            <td></td>
                            <td style="text-align: center; background-color: #F2F2F2; padding: 5px;">
                                <span style="font-size:20px;">{{$setting->name}}</span><br>
                                Uttara,Dhaka
                            </td>
                            <td style="padding-left: 50px;">
                                <span style="width: 5%;"> Showroom No:{{$setting->phone}}</span><br>
                                <span style="width: 5%;"> Owner No: {{$setting->phone1}}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
             <div class="col-md-12">
                <hr style="margin-bottom: 0px;">
                <table style="text-align:center;padding-bottom: 5px;padding-top: 2px;">
                    <tbody>
                        <tr  style="text-align: center;" >
                            
                            <td style="text-align: center;" >
                                <strong><span> Daily Invoice Report : ({{date('d-m-Y',strtotime($start_date))}} -- {{date('d-m-Y',strtotime($end_date))}})</span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr style="background-color:#ddd;">
                            <th>SL</th>
                            <th>customer Name</th>
                            <th>Invoice No</th>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total_sum = '0';
                        @endphp
                      @foreach($allData as $key => $invoice)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$invoice['payment']['customer']['name']}} ({{$invoice['payment']['customer']['phone']}} - {{$invoice['payment']['customer']['address']}})</td>
                            <td>Invoice-No #{{$invoice->invoice_no}}</td>
                            <td>{{date('d-m-Y',strtotime($invoice->date))}}</td>
                            <td style="text-align:center;">{{$invoice['payment']['total_amount']}}</td>
                            @php
                            $total_sum += $invoice['payment']['total_amount'];
                            @endphp
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" style="border-top:1px solid #ddd;text-align: right;">Grand Total : </td>
                        <td style="border-top:1px solid #ddd; text-align: center;">{{$total_sum}}</td>
                    </tr>
                    <hr style="margin-bottom: 0px;">
                    </tbody>

                </table>
            </div>
            </div>
                <hr style="margin-bottom: 0px;">
               @php
               $date = new DateTime('now',new dateTimeZone('Asia/Dhaka'));
               @endphp
               <i>Printing Time : {{$date->format('F j, Y, g:i a')}}</i>
            <div class="col-md-12">
                <hr style="margin-bottom: 0px;">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <p style="text-align:center;"></p>
                            </td>
                            <td></td>
                            <td>
                                <p style="text-align:center;margin-left:400px;border-bottom: 1px solid #ddd;">Owner Signature</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</body>
</html>