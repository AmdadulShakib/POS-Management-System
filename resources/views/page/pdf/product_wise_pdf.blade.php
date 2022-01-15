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
                                <span style="width: 5%;"> Showroom No: {{$setting->phone}}</span><br>
                                <span style="width: 5%;"> Owner No: {{$setting->phone1}}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
             <div class="col-md-12">
                <hr style="margin-bottom: 0px;">
                
            </div>
        <div class="row">
            <div class="col-md-12">
                <table style="padding-top:5px;" id="zero_config" class="table table-striped table-bordered">
                    <thead style="background-color: #ddd;">
                        <tr>
                            <th>Supplier Name</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Stock </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$product['supplier']['name']}}</td>
                            <td>{{$product['category']['name']}}</td>
                            <td>{{$product->name}}</td>
                            <td style="text-align:left;">{{$product->quantity}}</td>
                        </tr>
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