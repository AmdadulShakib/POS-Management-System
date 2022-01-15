@extends('page.layouts.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Product Mannage</h4>
            <div class="ml-auto ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Edit</li>
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
                <form class="form-horizontal" method="post" action="{{ route ('products.update',$editData->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-4  control-label col-form-label">Supplier Name: </label>
                                <div class="col-sm-8">
                                    <select name="supplier_id" class="form-control">
                                        <option value="">Select Supplier</option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}" {{($editData->supplier_id==$supplier->id)?"selected":''}}>{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-4  control-label col-form-label">Category Name: </label>
                                <div class="col-sm-8">
                                    <select name="category_id" class="form-control">
                                           <option value="">Select Category</option>

                                           @foreach($categories as $category)

                                           <option value="{{$category->id}}" {{($editData->category_id==$category->id)?"selected":''}}> {{$category->name}} </option>

                                           @endforeach
                                    </select>
                                </div>
                       </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-4  control-label col-form-label">Product Name: </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="lname" name="name" value="{{ $editData->name}}">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4  control-label col-form-label">Price: </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="number" name="price" value="{{ $editData->price}}">
                            </div>
                        </div>
                        <div class="border-top text-right">
                            <div class="card-body">
                                <button style="border-radius:4px;"  type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i> Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
