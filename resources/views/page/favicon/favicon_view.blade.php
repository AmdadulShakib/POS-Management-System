@extends('page.layouts.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Favicon Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Favicon View</li>
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
                            <th>Image</th>
                            <th width="8%">Action</th>
                        </tr>
                        </thead>
                          @foreach($allData as $favicon)
                        <tr>
                            <td>
                                <img  style="height: 20%;width: 20%;" src="{{(!empty($favicon->image))?url('public/assets/images/favicon/'.$favicon->image):url('public/assets/images/favicon/favicon.png')}}" class="avatar img-circle img-thumbnail" alt="avatar">
                            </td>
                            <td>
                                 <a style="border-radius:4px;" title="Edit" href="{{ route('favicons.edit', $favicon->id) }}" id="edit" class="btn btn-success"><i class="fa fa-edit"></i></a>
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