
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
                        <li class="breadcrumb-item active" aria-current="page">Category Add</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> 
<div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('products.view')}}"><button style="border-radius:4px;"  type="submit" class="btn btn-primary"><i class="fa fa-list"></i> View Products</button></a>
    </div>
</div>
<div style="padding:0px 20px;" class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" method="post" action="{{ route ('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body"> 
                        <div class="form-group row">
                            <label for="fname" class="col-sm-4 control-label col-form-label" required>Supplier Name: </label>
                                <div class="col-sm-8">
                                    <select name="supplier_id" class="form-control select2" required>
                                        <option value="">Select Supplier</option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-4  control-label col-form-label">Category Name: </label>
                                <div class="col-sm-8">
                                    <select name="category_id" class="form-control select2">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-4  control-label col-form-label">Product Name: </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="lname" name="name" placeholder="Product Name Here---" required>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4  control-label col-form-label">Price: </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="number" name="price" placeholder="Product Price Here--" required >
                            </div>
                        </div>
                    </div> 
                    <div class="border-top text-right">
                        <div class="card-body">
                            <button  style="border-radius:4px;"  type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i>  Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
