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
                        <li class="breadcrumb-item active" aria-current="page">Edit Supplier</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <form class="form-horizontal" method="post" action="{{ route ('profiles.password.update') }}" id="myForm">
                    @csrf

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="current_password" class="col-sm-4  control-label col-form-label">Current Password: </label>
                            <div class="col-sm-8">
                             <input  type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password here" >
                           </div>
                       </div>
                        <div class="form-group row">
                            <label for="new_password" class="col-sm-4  control-label col-form-label">New Password: </label>
                            <div class="col-sm-8">
                             <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password here" >
                           </div>
                       </div>
                        <div class="form-group row">
                            <label for="again_new_password" class="col-sm-4  control-label col-form-label">Confirm Password: </label>
                            <div class="col-sm-8">
                             <input type="password" name="again_new_password"  class="form-control" placeholder=" Confirm password here" >
                           </div>
                       </div>
                        
                    </div>
                    <div class="border-top text-right">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
          rules: {
            current_password: {
                required: true,
            },
            new_password: {
                required: true,
                minlength: 5
            },
            again_new_password: {
                required: true,
                equalTo: '#new_password'
            }
            },
            massage: {
                current_password: {
                    required: 'Please enter current password',
            },
                new_password: {
                    required: 'Please enter New password',
                    minlength: 'Please will be minimum 5 characters or numbers',
            },
                again_new_password: {
                    required: 'Please enter confirm password',
                    minlength: 'Confirm password does not match',
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
