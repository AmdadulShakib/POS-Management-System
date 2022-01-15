@extends('page.layouts.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Customer Crdit Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">customer Crdit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('crdit.customers')}}"><button style="border-radius:4px;" type="submit" class="btn btn-primary"><i class="fa fa-list"></i> Crdit customer List</button></a>
    </div>
</div>
<div style="padding:0px 20px;" class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table width="100%">
                           <tbody>
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td><strong> Customer Info :</strong></td>
                            </tr>
                               <tr style="text-align:left; ">
                                   <td width="30%"><strong>Name : </strong>  {{$payment['customer']['name']}} </td>
                                   <td width="30%"><strong>Mobile No: </strong>  {{$payment['customer']['phone']}}</td>
                                   <td width="40%"><strong>Address: </strong>  {{$payment['customer']['address']}}</td>
                               </tr>
                           </tbody>
                        </table>
                        <form method="POST" action="{{route('customers.update.invoice',$payment->invoice_id)}}" class="form-control">
                         @csrf          
                            <table border="1" style="border:1px solid #ddd;" width="100%">
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
                                           <td style="padding-right: 50px; text-align: right;" colspan="5" ><strong>Sub Total :</strong></td>
                                           <td style="text-align:center;"><strong>{{$total_sum}}</strong></td>
                                        </tr>
                                        <tr>
                                           <td style="padding-right: 50px; text-align: right;" colspan="5" ><strong>Discount :</strong></td>
                                           <td style="text-align:center;">{{$payment->discount_amount}}</td>
                                        </tr>
                                        <tr>
                                           <td style="padding-right: 50px; text-align: right;" colspan="5" ><strong>Paid Amount :</strong></td>
                                           <td style="text-align:center;">{{$payment->paid_amount}}</td>
                                        </tr>
                                        <tr>
                                           <td style="padding-right: 50px; text-align: right;" colspan="5" ><strong>Due Amount :</strong></td>
                                           <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
                                           <td style="text-align:center;">{{$payment->due_amount}}</td>
                                        </tr>
                                        <tr>
                                           <td style="padding-right: 50px; text-align: right;" colspan="5" ><strong>Grand Total :</strong></td>
                                           <td style="text-align:center;"><strong>{{$payment->total_amount}}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="padding-top:10px;" class="row">
                                    <div class="form-group col-md-3">
                                        <label>Paid Status</label>
                                            <select name="paid_status" id="paid_status" class="form-control form-control-sm">
                                                 <option value="">Select Status</option>
                                                 <option value="full_paid">Full Paid</option>
                                                 <option value="partial_paid">Partical Paid</option>
                                            </select>
                                            <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter Paid Amount" style="display: none;">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Date: </label>
                                            <input type="date" name="date" id="date" class="form-control form-control-sm" placeholder="YYYY-MM-DD">
                                    </div> 
                                        <div style="padding-top:29px;" class="form-group col-md-3">
                                            <button style="border-radius:4px;" type="submit" class="btn btn-primary">Invoice Update</button>
                                        </div> 
                               </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#zero_config').DataTable();
</script>
<script type="text/javascript">
     $(document).on('change','#paid_status',function(){
        //paid js
        var paid_status = $(this).val();
        if (paid_status == 'partial_paid') {
            $('.paid_amount').show();
        }else{
            $('.paid_amount').hide();
        }
    });
</script>

 @endsection