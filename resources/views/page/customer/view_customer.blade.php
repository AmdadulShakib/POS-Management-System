@extends('page.layouts.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">customer Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">customer View</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('customers.add')}}"><button style="border-radius:4px;" type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add customer</button></a>
    </div>
</div>
<div style="padding:0px 20px;" class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead style="background-color:#5964FF; color: white;font-weight:200;">
                                <tr>
                                    <th>SL</th>
                                    <th>Customer Name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>address</th>
                                    <th style="width:12%;">Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $key => $customer)
                                @php
                                $count_customer = App\Models\Payment::where('customer_id',$customer->id)->count();
                                @endphp
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>
                                        <a style="border-radius:4px;" href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a> 
                                        @if($count_customer<1)
                                        <a style="border-radius:4px;" title="Delete" href="{{ route('customers.delete', $customer->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
 @endsection