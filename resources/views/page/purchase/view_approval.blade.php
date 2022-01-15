@extends('page.layouts.master')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Purchase Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Padding Purchase List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('purchases.view')}}"><button style="border-radius:4px;" type="submit" class="btn btn-primary"><i class="fa fa-list"></i>  Purchase View</button></a>
    </div>
</div>
<div style="padding:0px 20px;" class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead style="background-color:#5964FF; color: white;font-weight:200;">
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Purchase No</th>
                                    <th>Supplier Name</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Buying Price</th>
                                    <th>Status </th>
                                    <th>Action </th>

                                </tr>
                            </thead>
                            <tbody>
                              @foreach($allData as $key => $purchase)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{date('d-m-Y',strtotime($purchase->date))}}</td>
                                    <td>{{$purchase->purchase_no}}</td>
                                    <td>{{$purchase['supplier']['name']}}</td>
                                    <td>{{$purchase['category']['name']}}</td>
                                    <td>{{$purchase['product']['name']}}</td>
                                    <td>{{$purchase->description}}</td>
                                    <td>{{$purchase->buying_qty}}</td>
                                    <td>{{$purchase->unit_price}}</td>
                                    <td>{{$purchase->buying_price}} TK</td>
                                    <td>
                                        @if($purchase->status== '0')
                                        <span style="background-color:#ff0101;padding: 5px;color: white;padding-top: 5px;">Pending</span>
                                        @elseif($purchase->status== '1')
                                        <span style="background-color:#00e738;padding: 5px;color: white;">Approved</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($purchase->status== '0')
                                        <a style="border-radius:4px;" title="Approval" href="{{ route('purchases.approve', $purchase->id) }}" id="approveBtn" class="btn btn-success"><i class="fa fa-check-circle"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @if($purchase->count() == 0)
                                <tr>
                                    <td class="text-center" colspan="100%">Data not found</td>
                                </tr>
                                @endif
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection