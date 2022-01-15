@extends('page.layouts.master')

@section('content')   
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Invoice Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice Add</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('invoices.view')}}"><button style="border-radius:4px;" type="submit" class="btn btn-primary"><i class="fa fa-list"></i> View Invoice</button></a>
    </div>
</div>
 <div style="padding:0px 20px;" class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal" method="post" action="{{ route ('invoices.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body"> 
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">Invoice No: </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="invoice_no" id="invoice_no" value="{{$invoice_no}}" class="form-control" readonly style="background-color: #D8FDBA">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">Date: </label>
                                            <div class="col-sm-8">
                                                <input type="date" name="date" id="date" class="form-control" value="{{$date}}" placeholder="YYYY-MM-DD">
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4 control-label col-form-label">Category Name: </label>
                                            <div class="col-sm-8">
                                            <select name="category_id" id="category_id" class="form-control select2">
                                                   <option value="">Select Category</option>

                                                   @foreach($categories as $category)

                                                   <option value="{{$category->id}}"> {{$category->name}} </option>

                                                   @endforeach
                                            </select>
                                           </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4 control-label col-form-label">Product Name: </label>
                                            <div class="col-sm-8">
                                             <select name="product_id" id="product_id" class="form-control select2">
                                                   <option value="">Select Product</option>

                                               </select>
                                           </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label"> Stock(Pcs/Kg): </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="current_stock_qty" id="current_stock_qty"  class="form-control" readonly style="background-color: #D8FDBA">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="border-top text-right">
                                        <div class="card-body">
                                            <a style="border-radius:4px;color:white;" class="btn btn-success addeventmore"><i class="fas fa-plus-circle"></i> Add</a>
                                        </div>
                                    </div> 
                                    <div class="card-body" >
                                        <form action="{{route ('invoices.store')}}" method="post" id="myForm2">
                                            @csrf
                                            <table border="1" class="table-sm table-broder" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th  width="20%">Category</th>
                                                        <th width="30%">Product Name</th>
                                                        <th width="10%">Pc/Kg</th>
                                                        <th width="16%">Unit Price</th>
                                                        <th width="20%">Total Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                    <tbody class="addRow" id="addRow">
                                                        
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4">Discount</td>
                                                            <td><input style="background-color:#c0e7ff;" type="text" name="discount_amount" id="discount_amount" class="form-control text-right" placeholder="Enter Discount Amount"> </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4"></td>
                                                            <td>
                                                                <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color:#D8FDBA">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                                <br>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <textarea class="form-control" name="description" id="description" placeholder="Write description here"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>Paid Status</label>
                                                    <select name="paid_status" id="paid_status" class="form-control form-control-sm">
                                                        <option value="">Select Status</option>
                                                        <option value="full_paid">Full Paid</option>
                                                        <option value="full_due">Full Due</option>
                                                        <option value="partial_paid">Partical Paid</option>
                                                    </select>
                                                    <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter Paid Amount" style="display: none;">
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label>Customer Name</label>
                                                    <select name="customer_id" id="customer_id" class=" form-control form-control-sm select2">
                                                        <option value="">Select Customer</option>

                                                        @foreach ($customers as $customer)

                                                        <option value="{{$customer->id}}">{{$customer->name}} ({{$customer->phone}} - {{$customer->address}})</option>
                                                        @endforeach

                                                        <option value="0">New Customer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row add_customer" style="display: none;padding-top: 10px;">
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="name" id="name" class=" form-control form-control-sm" placeholder="Enter customer name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="number" name="phone" id="phone" class="form-control form-control-sm" placeholder="Enter customer number">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="address" name="address" id="address" class="form-control form-control-sm" placeholder="Enter customer address">
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button style="border-radius:4px;" type="submit" class="btn btn-primary" id="soteButton"><i class="fas fa-file-invoice-dollar"></i>  Invoice Save</button>
                                            </div>
                                        </form>
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

<!---Quentity--->
<script type="text/javascript">
    $(function(){
        $(document).on('change','#product_id',function(){
            var product_id = $(this).val();
            $.ajax({
                url:"{{route('check_product_stock')}}",
                type:"GET",
                data:{product_id:product_id},
                success:function(data){
                    $('#current_stock_qty').val(data);
                }
            });
        });
    });
</script>



<!---product--->
<script type="text/javascript">
   $(function(){
        $(document).on('change','#category_id',function(){
            var category_id = $(this).val();
            $.ajax({
                url:"{{route('get_product')}}",
                type:"GET",
                data:{category_id:category_id},
                success:function(data){
                    var html = '<option value="">Select Product</option>';
                    $.each(data,function(key,v){
                        html +='<option value="'+v.id+'">'+v.name+'</option>';
                    });
                    $('#product_id').html(html);
                }
            });
        });
   });
</script>

<!---Add iTEM 1--->
<script id="document-template" type="text/x-handlebars-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date" value="@{{date}}">
        <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{category_name}}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{product_name}}
        </td>
        <td>
            <input type="number" min="1" class="form-control form-control-sm text-right selling_qty" name="selling_qty[]" value="1">
        </td>
        <td>
            <input type="number" id="unit_price" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
        </td>
        <td>
            <input class="form-control form-control-sm text-right selling_price" name="selling_price[]" value="0" readonly>
        </td>
        <td><i class="btn btn-danger btn-md fa fa-window-close removeeventmore"></i></td>
    </tr>
</script>

<!---add item 2--->

<script type="text/javascript">
    $(document).ready(function (){
        $(document).on("click",".addeventmore", function (){
            var date = $('#date').val();
            var invoice_no = $('#invoice_no').val();
            var supplier_id = $('#supplier_id').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();

            if(date==''){
                $.notify("Date is required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if(category_id==''){
                $.notify("category is required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if(product_id==''){
                $.notify("product is required", {globalPosition: 'top right',className: 'error'});
                return false;
            }

           var source = $("#document-template").html();
           var template = Handlebars.compile(source);
           var data = {
                    data:data,
                    invoice_no:invoice_no,
                    category_id:category_id,
                    category_name:category_name,
                    product_id:product_id,
                    product_name:product_name
           };
           var html = template(data);
           $("#addRow").append(html); 

        });

        $(document).on("click", ".removeeventmore", function (event) {
            $(this).closest(".delete_add_more_item").remove();
            totalAmountPrice();
        });

        $(document).on('keyup click','.unit_price,.selling_qty',function(){
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.selling_qty").val();
            var total = unit_price * qty;
            $(this).closest("tr").find("input.selling_price").val(total);
            $('#discount_amount').trigger('keyup');
        });

        $(document).on('keyup','#discount_amount',function(){
            totalAmountPrice();
        });
        

 //calculate sum of ammount in invoice

    function totalAmountPrice(){
        var sum=0;
        $(".selling_price").each(function(){
            var value = $(this).val();
            if(!isNaN(value) && value.length != 0) {
                sum += parseFloat(value);
            }
        });
        var discount_amount = parseFloat($('#discount_amount').val());
        if (!isNaN(discount_amount) && discount_amount.length != 0) {
            sum -=parseFloat(discount_amount);
        }

        $('#estimated_amount').val(sum);
    }
    });
    
</script>

<!-- paid -->
<script type="text/javascript">
    $(document).on('change','#paid_status',function(){
        //paid js
        var paid_status = $(this).val();
        if (paid_status == 'partial_paid') {
            $('.paid_amount').show();
        }else{
            $('.paid_amount').hide();
        }
    });
    $(document).on('change','#customer_id',function(){
        var customer_id = $(this).val();
        if (customer_id == '0') {
            $('.add_customer').show();
        }else{
            $('.add_customer').hide();
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm2').validate({
          rules: {
            unit_price: {
                required: true,
            },
            paid_status: {
                required: true,
            },
            customer_id: {
                required: true,
            }
            },
            massage: {
                unit_price: {
                    required: 'Please enter Unit Price',
            },
             paid_status: {
                    required: 'Please select paid status',
            },
                customer_id: {
                    required: 'Please  select customer',
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

