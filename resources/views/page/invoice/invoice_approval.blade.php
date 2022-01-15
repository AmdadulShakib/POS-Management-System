
 @extends('page.layouts.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Invoice Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice View</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"> 
                    <h3>Invoice No #{{$invoice->invoice_no}}({{date('d-m-Y', strtotime($invoice->date))}})</h3>
                </div>
                <div class="border-top text-right">
                    <div class="card-body">
                        <a href="{{route ('invoices.pending.list')}}"><button style="border-radius:4px;" type="submit" class="btn btn-primary"><i class="fa fa-list"></i> Invoice Padding List</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @php
                        $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
                        @endphp
                        <table width="100%">
                           <tbody>
                               <tr>
                                   <td width="15%"><p><strong>Customer Info :</strong></p></td>
                                   <td width="25%"><p><strong>Name : </strong>  {{$payment['customer']['name']}} </p> </td>
                                   <td width="25%"><p><strong>Mobile No: </strong>  {{$payment['customer']['phone']}} </p></td>
                                   <td width="35%"><p><strong>Address: </strong>  {{$payment['customer']['address']}} </p></td>
                               </tr>
                               <tr>
                                   <td width="15%"></td>
                                   <td width="85%" colspan="3"><p><strong>Description : </strong> {{$invoice->description}}</p></td>
                               </tr>
                           </tbody>
                        </table>
                        <form method="POST" action="{{route ('approval.store',$invoice->id)}}">
                            @csrf
                            <table border="1" width="100%" style="margin-bottom: 10px;">
                               <thead style="background-color:#5964FF; color: white;font-weight:200;text-align: center;">
                                <tr>
                                   <th>SL.</th>
                                   <th>Category</th>
                                   <th>Product Name</th>
                                   <th style="background-color:#99c2f1; text-align: center;color: white;">Current Stock</th>
                                   <th>Quanty</th>
                                   <th>Unit Price</th>
                                   <th>Total Price</th>
                                   </tr>
                               </thead>
                               <tbody style="text-align: center;">
                                    @php
                                    $total_sum = '0';
                                    @endphp
                                    @foreach($invoice['invoice_detalis'] as $key => $details)
                                   <tr>
                                    <input type="hidden" name="category_id[]" value="{{$details->category_id}}">
                                    <input type="hidden" name="product_id[]" value="{{$details->product_id}}">
                                    <input type="hidden" name="selling_qty[{{$details->id}}]" value="{{$details->selling_qty}}">
                                       <td>{{$key+1}}</td>
                                       <td>{{$details['category']['name']}}</td>
                                       <td>{{$details['product']['name']}}</td>
                                       <td style="background-color:#99c2f1; text-align: center;color: white;">{{$details['product']['quantity']}}</td>
                                       <td>{{$details->selling_qty}}</td>
                                       <td>{{$details->unit_price}}</td>
                                       <td>{{$details->selling_price}}</td>
                                   </tr>
                                   @php
                                   $total_sum += $details->selling_price;
                                   @endphp
                                   @endforeach
                                   <tr>
                                       <td style="padding-right: 10px;" colspan="6" class="text-right"><strong>Sub Total </strong></td>
                                       <td class="text-center"><strong>{{$total_sum}}</strong></td>
                                   </tr>
                                    <tr>
                                       <td style="padding-right: 10px;" colspan="6" class="text-right"><strong>Discount </strong></td>
                                       <td class="text-center"><strong>{{$payment->discount_amount}}</strong></td>
                                   </tr>
                                    <tr>
                                       <td style="padding-right: 10px;" colspan="6" class="text-right"><strong>Paid Amount </strong></td>
                                       <td class="text-center"><strong>{{$payment->paid_amount}}</strong></td>
                                   </tr>
                                    <tr>
                                       <td style="padding-right: 10px;" colspan="6" class="text-right"><strong>Due Amount </strong></td>
                                       <td class="text-center"><strong>{{$payment->due_amount}}</strong></td>
                                   </tr>
                               </tbody>
                                    <tr>
                                       <td style="padding-right: 10px;" colspan="6" class="text-right"><strong>Grand Total </strong></td>
                                       <td class="text-center"><strong>{{$payment->total_amount}}</strong></td>
                                   </tr>
                               </tbody>
                            </table>
                        <button style="border-radius:4px;" type="submit" class="btn btn-success">Invoice Approve</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#zero_config').DataTable();
</script>
 @endsection