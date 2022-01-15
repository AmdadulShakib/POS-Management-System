@extends('page.layouts.master')

@section('content')   
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Daily Invoice Report</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daily Invoice Report</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div style="padding-top:50px;" class="card">
                <form class="form-horizontal" method="GET" action="{{ route ('invoice.daily.report.pdf') }}" id="myForm" target="_blank">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-4  control-label col-form-label">Start Date: </label>
                            <div class="col-sm-8">
                                <input type="date" name="start_date" id="start_date" class="form-control"placeholder="YYYY-MM-DD">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-4  control-label col-form-label">End Date: </label>
                            <div class="col-sm-8">
                                <input type="date" name="end_date" id="end_date" class="form-control"placeholder="YYYY-MM-DD">
                            </div>
                        </div>
                        <div class="border-top text-right">
                            <div class="card-body">
                                <button style="border-radius:4px;" type="submit" class="btn btn-primary" id="soteButton"><i class="fas fa-search"></i>  Search</button>
                            </div>
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
              start_date: {
                required: true,
            },
              end_date: {
                required: true,
            }
            },
            massage: {
                start_date: {
                    required: 'Please enter your Start Date',
                },
                end_date: {
                    required: 'Please enter your End Date',
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