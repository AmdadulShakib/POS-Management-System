@extends('page.layouts.master')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route ('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                    <h6 class="text-white">Dashboard</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                    <h6 class="text-white">Charts</h6>
                </div>
            </div>
        </div>
         <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                    <h6 class="text-white">Customer</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                    <h6 class="text-white">Supplier</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                    <h6 class="text-white">Product</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Site Analysis</h4>
                            <h5 class="card-subtitle">Overview of Latest Month</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <!-- column -->
                                <div style="height: 450px;width: 800px;margin: auto;" class="col-lg-9">
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="bg-dark p-10 text-white text-center">
                                       <i class="fa fa-user m-b-5 font-16"></i>
                                       <h5 class="m-b-0 m-t-5">{{$totalCustomers}}</h5>
                                       <small class="font-light">Total Customers</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-dark p-10 text-white text-center">
                                       <i class="fa fa-plus m-b-5 font-16"></i>
                                       <h5 class="m-b-0 m-t-5">{{$totalProducts}}</h5>
                                       <small class="font-light">Total Products</small>
                                    </div>
                                </div>
                                <div class="col-6 m-t-15">
                                    <div class="bg-dark p-10 text-white text-center">
                                       <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                       <h5 class="m-b-0 m-t-5">{{$totalPurchase}}</h5>
                                       <small class="font-light">Total Purchases</small>
                                    </div>
                                </div>
                                <div class="col-6 m-t-15">
                                    <div class="bg-dark p-10 text-white text-center">
                                       <i class="fa fa-tag m-b-5 font-16"></i>
                                       <h5 class="m-b-0 m-t-5">{{$totalInvoices}}</h5>
                                       <small class="font-light">Total Invoices</small>
                                    </div>
                                </div>
                                <div class="col-6 m-t-15">
                                    <div class="bg-dark p-10 text-white text-center">
                                       <i class="fa fa-table m-b-5 font-16"></i>
                                       <h5 class="m-b-0 m-t-5">{{$totalSuppliers}}</h5>
                                       <small class="font-light">Total Suppliers</small>
                                    </div>
                                </div>
                                <div class="col-6 m-t-15">
                                    <div class="bg-dark p-10 text-white text-center">
                                       <i class="fa fa-globe m-b-5 font-16"></i>
                                       <h5 class="m-b-0 m-t-5">{{$totalCategorys}}</h5>
                                       <small class="font-light">Total Category</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@include('page.include.footer')
<script src="{{asset('assets/dist/js/chartjs.min.js') }}"></script>

<script>
    $(function(){
        var datas = <?php echo json_encode($datas); ?>;
        var barCanvas = $("#barChart");
        var barChart = new Chart(barCanvas,{
            type:'bar',
            data:{
                labels:['Jan','Feb','Mar','Apr','May','jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                datasets:[
                    {
                        label:'New Customer Growth, 2022',
                        data:datas,
                        backgroundColor:['red','orange','yellow','green','blue','indigo','violet','purple','pink','brown','yellow','black']
                    }
                ]
            },
            options:{
                 scales:{
                    yAxes:[{
                        ticks:{
                            beginAtZero:true
                        }
                    }]
                 }
            }
        });
    })
</script>
@endsection