@extends('page.layouts.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Setting Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Setting View</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered">
                            <thead style="background-color:#5964FF; color: white;font-weight:200;">
                                <tr>
                                    <th>Company Name</th>
                                    <th>Company Address</th>
                                    <th>Showroom Number</th>
                                    <th>Owner Number</th>
                                    <th style="width:15%;">Action</th>
                                </tr>
                            </thead>
                            @foreach($allData as $setting)
                            <tbody>
                                <tr>
                                    <td>{{$setting->name}}</td>
                                    <td>{{$setting->address}}</td>
                                    <td>{{$setting->phone}}</td>
                                    <td>{{$setting->phone1}}</td>
                                    <td>
                                    <a style="border-radius:4px;" href="{{ route('settings.edit', $setting->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
@endsection