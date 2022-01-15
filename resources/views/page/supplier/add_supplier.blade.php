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
                        <li class="breadcrumb-item active" aria-current="page">Add Supplier</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>  
<div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('suppliers.view')}}"><button style="border-radius:4px;"  type="submit" class="btn btn-primary"><i class="fa fa-list"></i> View Supplier</button></a>
    </div>
</div>
<div style="padding:0px 20px;" class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
        <form class="form-horizontal" method="post" action="{{ route ('suppliers.store') }}" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="lname" class="col-sm-4  control-label col-form-label"> Name: </label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="name" class="form-control" placeholder=" Name Here">
                        <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                   </div>
               </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-4  control-label col-form-label">Email: </label>
                    <div class="col-sm-8">
                        <input type="email" name="email" id="email" class="form-control" placeholder=" Email Here">
                        <font style="color:red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="lname" class="col-sm-4  control-label col-form-label">Phone Number: </label>
                    <div class="col-sm-8">
                        <input type="number" name="phone"  class="form-control" placeholder=" Number Here" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-4  control-label col-form-label">Address: </label>
                    <div class="col-sm-8">
                        <input type="address" name="address"  class="form-control" placeholder=" Address Here" >
                    </div>
                </div>
                
            </div>
            <div class="border-top text-right">
                <div class="card-body">
                    <button style="border-radius:4px;"  type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i>  Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
          rules: {
              name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            number: {
                required: true,
                minlength: 6
            },
            addresh: {
                required: true,
                equalTo: '#password'
            }
            },
            massage: {
                name: {
                    required: 'Please enter your name',
                },
                email: {
                    required: 'Please enter email address',
                    email: 'Please enter a <em>valid</em> email address',
                },
                number: {
                    required: 'Please enter number',
            },
                addresh: {
                    required: 'Please enter addresh',
                    minlength: 'Please enter your addresh',
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element){
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element) {
         $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
         $(element).parent().removeClass('error')
            }
        });
    });
</script>

@endsection
