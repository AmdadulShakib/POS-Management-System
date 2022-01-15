
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
                        <li class="breadcrumb-item active" aria-current="page">Approvel View</li>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead style="background-color:#5964FF; color: white;font-weight:200;">
                                <tr>
                                    <th>SL</th>
                                    <th>customer Name</th>
                                    <th>Invoice No</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>status</th>
                                    <th width="12%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($allData as $key => $invoice)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$invoice['payment']['customer']['name']}} ({{$invoice['payment']['customer']['phone']}} - {{$invoice['payment']['customer']['address']}})</td>
                                    <td>Invoice-No # {{$invoice->invoice_no}}</td>
                                    <td>{{date('d-m-Y',strtotime($invoice->date))}}</td>
                                    <td>{{$invoice->description}}</td>
                                    <td>{{$invoice['payment']['total_amount']}} TK</td>
                                    <td style="padding-top: 2%;">
                                        @if($invoice->status== '0')
                                        <span style="background-color:#ff0101;padding: 5px;color: white;">Pending</span>
                                        @elseif($invoice->status== '1')
                                        <span style="background-color:#00e738;padding: 5px;color: white;">Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($invoice->status== '0')
                                         <a  style="border-radius:4px;" title="Approval" href="{{ route('invoices.approve', $invoice->id) }}" class="btn btn-success"><i class="fa fa-check-circle"></i></a>
                                         <a  style="border-radius:4px;" title="Delete" href="{{ route('invoices.delete', $invoice->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                              @endforeach
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