@extends('page.layouts.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Supplier Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Supplier view</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>                        
<div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('suppliers.add')}}"><button style="border-radius:4px;" type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Supplier</button></a>
    </div>
</div>
<div style="padding:0px 20px;" class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered">
                        <thead style="background-color:#5964FF; color: white;font-weight:200;">
                        <tr>
                            <th>SL</th>
                            <th>Supplier Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th >Active</th>
                        </tr>
                        </thead>
                        @foreach($allData as $key => $supplier)
                        @php
                        $count_supplier = App\Models\Product::where('supplier_id',$supplier->id)->count();
                        @endphp       
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$supplier->name}}</td>
                            <td style="width:20%;">{{$supplier->email}}</td>
                            <td style="width:20%;">{{$supplier->phone}}</td>
                            <td style="width:25%;">{{$supplier->address}}</td>
                            <td style="width:12%;">
                                <a style="border-radius:4px;" href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a> 
                                @if($count_supplier<1)
                                <a style="border-radius:4px;" title="Delete" href="{{ route('suppliers.delete', $supplier->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                 @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
<div id="styleSelector"> </div>
</div>
 @endsection