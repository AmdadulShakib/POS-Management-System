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
 							<td><strong>Invoice No #{{$payment['invoice']['invoice_no']}}</strong></td>
 							<td style="text-align: center; background-color: #F2F2F2; padding: 5px;">
 								<span style="font-size:20px;">{{$setting->name}}</span><br>
 								{{$setting->address}}
 							</td>
 							<td style="padding-left: 15px;">
 								<strong><span style="font-size:12px;"> Showroom No:{{$setting->phone}}</span></strong><br>
 								<strong><span style="font-size:12px;"> Owner No: {{$setting->phone1}}</span></strong>
 							</td>
 						</tr>
 					</tbody>
 				</table>
 			</div>
 		</div>
 			 <div class="col-md-12">

 				<hr style="margin-bottom: 0px;">
 				<table width="100%">
                   <tbody>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td><strong> Customer Detail :</strong></td>
                    </tr>
                       <tr style="text-align:left; ">
                           <td width="25%"><strong>Name : </strong>  {{$payment['customer']['name']}} </td>
                           <td width="35%"><strong>Mobile No: </strong>  {{$payment['customer']['phone']}}</td>
                           <td width="40%"><strong>Address: </strong>  {{$payment['customer']['address']}}</td>
                       </tr>
                   </tbody>
               </table>
           </div>
 			<div class="col-md-12">
 				<hr style="margin-bottom: 0px;">
			   <table width="100%">
                   <thead style="text-align: center;">
                    <tr>
                       <th>SL.</th>
                       <th>Category</th>
                       <th>Product Name</th>
                       <th>Quanty</th>
                       <th>Unit Price</th>
                       <th >Total Price</th>
                    </tr>
                   </thead>
                   <tbody>
                    @php
                    $total_sum = '0';
                    $invoice_details = App\Models\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
                    @endphp
                    @foreach($invoice_details as $key => $details)
                       <tr>
                           <td style="text-align:center;">{{$key+1}}</td>
                           <td style="text-align:center;">{{$details['category']['name']}}</td>
                           <td style="text-align:center;">{{$details['product']['name']}}</td>
                           <td style="text-align:center;">{{$details->selling_qty}}</td>
                           <td style="text-align:center;">{{$details->unit_price}}</td>
                           <td style="text-align:center;">{{$details->selling_price}}</td>
                       </tr>
                       @php
                       $total_sum += $details->selling_price;
                       @endphp
                       @endforeach
                       <tr>
                           <td style="padding-right: 15px; text-align: right;" colspan="5" ><strong>Sub Total :</strong></td>
                           <td style="text-align:center;"><strong>{{$total_sum}}</strong></td>
                       </tr>
                        <tr>
                           <td style="padding-right: 15px; text-align: right;" colspan="5" ><strong>Discount :</strong></td>
                           <td style="text-align:center;">{{$payment->discount_amount}}</td>
                       </tr>
                        <tr>
                           <td style="padding-right: 15px; text-align: right;" colspan="5" ><strong>Paid Amount :</strong></td>
                           <td style="text-align:center;">{{$payment->paid_amount}}</td>
                       </tr>
                        <tr>
                           <td style="padding-right: 15px; text-align: right;" colspan="5" ><strong>Due Amount :</strong></td>
                           <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
                           <td style="text-align:center;">{{$payment->due_amount}}</td>
                       </tr>
                        <tr>
                           <td style="padding-right: 15px; text-align: right;" colspan="5" ><strong>Grand Total :</strong></td>
                           <td style="text-align:center;"><strong>{{$payment->total_amount}}</strong></td>
                       </tr>
                       <tr>
                       	<td colspan="4" style="text-align:center;font-weight: bold;border-bottom: 1px solid #ddd;">Paid Summary</td>
                       </tr>
                       <tr>
                       	<td colspan="3" ><strong>Date</strong> </td>
                       	<td colspan="3"><strong>Amount</strong></td>
                       </tr>
                       @php
                       	$payment_details = App\Models\PaymentDetail::where('invoice_id',$payment->invoice_id)->get();
                       @endphp
                       @foreach($payment_details as $dtl)
                       <tr>
                       	<td colspan="3">{{date('d-m-Y',strtotime($dtl->date))}}</td>
                       	<td colspan="3">{{$dtl->current_paid_amount}}</td>
                       </tr>
                       @endforeach
                   </tbody>
             </table>
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