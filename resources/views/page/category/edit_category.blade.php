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
                        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div style="padding-top:50px;" class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" method="post" action="{{ route ('categories.update', $editData->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-4  control-label col-form-label"> Name: </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="fname" name="name" value="{{ $editData->name }}" >
                                </div>
                        </div>
                        <div class="border-top text-right">
                            <div class="card-body">
                                <button style="border-radius:4px;"  type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i>  Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
