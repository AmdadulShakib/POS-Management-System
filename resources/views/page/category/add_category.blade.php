@extends('page.layouts.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Category Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category add</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> 
<div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('categories.view')}}"><button style="border-radius:4px;"  type="submit" class="btn btn-primary"><i class="fa fa-list"></i> View Category</button></a>
    </div>
</div>
<div style="padding:0px 20px;" class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" method="post" action="{{ route ('categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-4  control-label col-form-label" required> Name: </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="fname" name="name" placeholder="Categorey Name Here" required >
                            </div>
                               <!-- <div class="form-group row">
                                    <label for="cono1" class="col-sm-4  control-label col-form-label">Type: </label>
                                    <div class="col-sm-8">
                                    <select name="type" id="" class="form-control">
                                        <option disabled="" selected=""></option>
                                        <option>Distributor</option>
                                        <option>Whole Seller</option>
                                        <option>Brochure</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-4  control-label col-form-label">Photo: </label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" id="cono1" name="photo" accept="image/*" required onchange="readURL(this);">
                                    </div>
                                </div>--->
                        </div>
                        <div class="border-top text-right">
                            <div class="card-body">
                                <button style="border-radius:4px;"  type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
