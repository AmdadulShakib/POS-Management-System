@extends('page.layouts.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Profile Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
                <form class="form-horizontal" method="post" action="{{ route ('profiles.update',$editData->id) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body"> 
                            <div class="form-group row">
                                <label for="lname" class="col-sm-4  control-label col-form-label"> Name: </label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" id="name" class="form-control" value="{{$editData->name}}" placeholder=" Name Here">
                                    <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="lname" class="col-sm-4  control-label col-form-label"> Address: </label>
                                <div class="col-sm-8">
                                    <input type="text" name="address" id="address" class="form-control" value="{{$editData->address}}" placeholder=" address Here">
                                    <font style="color:red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-4  control-label col-form-label">Email: </label>
                                <div class="col-sm-8">
                                 <input type="email" name="email" id="email" class="form-control" value="{{$editData->email}}" placeholder=" Email Here">
                                 <font style="color:red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                               </div>
                           </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-4  control-label col-form-label">Mobile: </label>
                                <div class="col-sm-8">
                                 <input type="number" name="mobile" id="mobile" class="form-control" value="{{$editData->mobile}}" placeholder=" mobile number Here">
                                 <font style="color:red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                               </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-4  control-label col-form-label">Gender: </label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value=" Male" {{($editData->gender=="Male")?"selected":""}}>Male</option>
                                        <option value="Female" {{($editData->gender=="Female")?"selected":""}}>Female</option>
                                        <option value="Other" {{($editData->gender=="Other")?"selected":""}}>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-4  control-label col-form-label">Image: </label>
                                <div class="col-sm-8">
                                 <input type="file" name="image" id="image" class="form-control" value="{{$editData->image}}">
                                 <font style="color:red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                               </div>
                            </div>
                            <div class="col-md-2">
                                <img id="showImage"  style="border-radius: 15px 50px;" src="{{(!empty($editData->image))?url('public/assets/images/admin/'.$editData->image):url('public/assets/images/admin/images.jpg')}}" class="avatar img-circle img-thumbnail" alt="avatar">
                            </div>
                        </div>  
                    <div class="border-top text-right">
                        <div class="card-body">
                            <button  style="border-radius:4px;"  type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i>  Update</button>
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
              address: {
                required: true,
                address:true,
            },
            email: {
                required: true,
                email: true,
            },
            mobile: {
                required: true,
                mobile:true,
            },
            gender: {
                required: true,
            }
            },
            massage: {
                name: {
                    required: 'Please enter your name',
                },
                address: {
                    required: 'Please enter your address',
                },
                email: {
                    required: 'Please enter email address',
                    email: 'Please enter a <em>valid</em> email address',
                },
                mabile: {
                    required: 'Please enter number',
            },
                gender: {
                    required: 'Please select your gender',
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
