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
 							<td><strong>Invoice No: #{{$invoice->invoice_no}}</strong></td>
 							<td style="text-align: center; background-color: #F2F2F2; padding: 5px;">
 								<span style="font-size:20px;">{{$setting->name}}</span><br>
 								Uttara,Dhaka
 							</td>
 							<td style="padding-left: 15px;">
 								<strong><span style="font-size:12px;"> Showroom No: {{$setting->phone}}</span></strong><br>
 								<strong><span style="font-size:12px;"> Owner No: {{$setting->phone1}}</span></strong>
 							</td>
 						</tr>
 					</tbody>
 				</table>
 			</div>
 		</div>
 			 <div class="col-md-12">

 				<hr style="margin-bottom: 0px;">
 				<table style="text-align:center;padding-bottom: 10px;">
 					<tbody  style="border-bottom: 1px solid #ddd;">
 						<tr  style="text-align: center;" >
 							
 							<td style="text-align: center;" >
 								<strong><span> Customer Invoice</span></strong>
 							</td>
 						</tr>
 					</tbody>
 				</table>
 			</div>
 			<div class="col-md-12">
 				@php
			    $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
			    @endphp
			   <table width="100%">
			       <tbody>
			           <tr style="text-align:left;">
			               <td width="20%"><strong>Name : </strong>  {{$payment['customer']['name']}} </td>
			               <td width="40%"><strong>Mobile No: </strong>  {{$payment['customer']['phone']}}</td>
			               <td width="40%"><strong>Address: </strong>  {{$payment['customer']['address']}}</td>
			           </tr>
			       </tbody>
			   </table>
			</div>
			<div class="row">
			   	<div class="col-md-12">
				<hr style="margin-bottom: 0px;">
			    <table width="100%">
			       <thead style="text-align: center;">
			        <tr>
			           <th>SL.</th>
			           <th>Category</th>
			           <th>Product Name</th>
			           <th>Quanty</th>
			           <th style="text-align:center;">Unit Price</th>
			           <th style="text-align:right;">Total Price</th>
			        </tr>
			       </thead>
			       <tbody>
			        @php
			        $total_sum = '0';
			        @endphp
			        @foreach($invoice['invoice_detalis'] as $key => $details)
			           <tr>
			               <td>{{$key+1}}</td>
			               <td>{{$details['category']['name']}}</td>
			               <td>{{$details['product']['name']}}</td>
			               <td style="text-align:center;">{{$details->selling_qty}}</td>
			               <td style="text-align:center;">{{$details->unit_price}}</td>
			               <td style="text-align:right;">{{$details->selling_price}}</td>
			           </tr>
			           @php
			           $total_sum += $details->selling_price;
			           @endphp
			           @endforeach
			           <tr>
			               <td style="padding-right: 10px; text-align: right;" colspan="5" class="text-right"><strong>Sub Total :</strong></td>
			               <td style="text-align:right;"><strong>{{$total_sum}}</strong></td>
			           </tr>
			            <tr>
			               <td style="padding-right: 10px; text-align: right;" colspan="5" class="text-right"><strong>Discount :</strong></td>
			               <td style="text-align:right;">{{$payment->discount_amount}}</td>
			           </tr>
			            <tr>
			               <td style="padding-right: 10px; text-align: right;" colspan="5" class="text-right"><strong>Paid Amount :</strong></td>
			               <td style="text-align:right;">{{$payment->paid_amount}}</td>
			           </tr>
			            <tr>
			               <td style="padding-right: 10px; text-align: right;" colspan="5" class="text-right"><strong>Due Amount :</strong></td>
			               <td style="text-align:right;">{{$payment->due_amount}}</td>
			           </tr>
			            <tr>
			               <td style="padding-right: 10px; text-align: right;" colspan="5" class="text-right"><strong>Grand Total :</strong></td>
			               <td style="text-align:right;"><strong>{{$payment->total_amount}}</strong></td>
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
								<p style="text-align:center;border-bottom: 1px solid #ddd;">Customer Signature</p>
							</td>
							<td></td>
							<td>
								<p style="text-align:center;margin-left:300px;border-bottom: 1px solid #ddd;">Seller Signature</p>
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