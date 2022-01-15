@extends('page.layouts.master')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Stock Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stock Report</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('products.pdf')}}" target="_blank"><button style="border-radius:4px;" type="submit" class="btn btn-primary"><i class="fa fa-download"></i> Download PDF</button></a>
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
                                    <th>Supplier Name</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>In.Qty</th>
                                    <th>Out.qty</th>
                                    <th>Stock </th>
                                    <th>price</th>
                                </tr>
                            </thead>
                              @foreach($allData as $key => $product)
                              @php
                                $buying_total = App\Models\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');
                                $selling_total = App\Models\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                              @endphp
                            <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$product['supplier']['name']}}</td>
                                    <td>{{$product['category']['name']}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$buying_total}}</td>
                                    <td>{{$selling_total}}</td>
                                     <td>{{$product->quantity}}</td>
                                    <td>{{$product->price}}</td> 
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 @endsection