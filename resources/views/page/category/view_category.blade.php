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
                        <li class="breadcrumb-item active" aria-current="page">Category View</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('categories.add')}}"><button style="border-radius:4px;"  type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Category</button></a>
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
                                    <th width="10%">SL</th>
                                    <th>Category Name</th>
                                    <th style="width:12%;">Action</th>
                                </tr>
                        </thead>
                            @foreach($allData as $key => $category)
                            @php
                                $count_category = App\Models\Product::where('category_id',$category->id)->count();
                            @endphp
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                    <a style="border-radius:4px;"  href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                     @if($count_category<1)
                                    <a style="border-radius:4px;"  title="Delete" href="{{ route('categories.delete', $category->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                     @endif
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection