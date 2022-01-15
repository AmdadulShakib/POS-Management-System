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
                        <li class="breadcrumb-item active" aria-current="page">Edit Setting</li>
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
                <form class="form-horizontal" method="post" action="{{ route ('settings.update', $editData->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-4  control-label col-form-label"> Name: </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="fname" name="name" value="{{ $editData->name }}" >
                                </div>
                                  
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-4  control-label col-form-label"> Showroom Number: </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{ $editData->phone }}" >
                                </div>
                                  
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-4  control-label col-form-label"> Owner Number: </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="phone1" name="phone1" value="{{ $editData->phone1 }}" >
                                </div>
                                  
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-4  control-label col-form-label"> Owner Number: </label>
                                <div class="col-sm-8">
                                    <input type="address" class="form-control" id="address" name="address" value="{{ $editData->address }}" >
                                </div>
                                  
                        </div>
                        <div class="border-top text-right">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
