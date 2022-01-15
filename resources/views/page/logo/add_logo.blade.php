@extends('page.layouts.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Logo Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Logo add</li>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal" method="post" action="{{ route ('logos.update', $editData->id) }}" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4  control-label col-form-label">Image: </label>
                                            <div class="col-sm-8">
                                                <input type="file" name="image" id="image" class="form-control">
                                                <font style="color:red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <img id="showImage"  style="border-radius: 15px 50px; margin-left: 25%;" src="{{(!empty($editData->image))?url('public/assets/images/logo/'.$editData->image):url('public/assets/images/logo/images.jpg')}}" class="avatar img-circle img-thumbnail" alt="avatar">
                                        </div> 
                                    </div>
                                    <div class="border-top text-right">
                                        <div class="card-body">
                                            <button style="border-radius:4px;"  type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i> Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
          rules: {
              image: {
                required: true,
            }
            },
            massage: {
                image: {
                    required: 'Please select image',
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
<script type="text/javascript">
     $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
     });
 </script>

@endsection
