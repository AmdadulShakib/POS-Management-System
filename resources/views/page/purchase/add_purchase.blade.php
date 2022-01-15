
@extends('page.layouts.master')

@section('content')   
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Purchase Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Purchase Add</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('purchases.view')}}"><button style="border-radius:4px;" type="submit" class="btn btn-primary"><i class="fa fa-list"></i> View Purchase</button></a>
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
                                <form class="form-horizontal" method="post" action="{{ route ('purchases.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body"> 
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">Date: </label>
                                            <div class="col-sm-8">
                                                <input type="date" name="date" id="date" class="form-control"placeholder="YYYY-MM-DD">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label">Purchase No: </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="purchase_no" id="purchase_no" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label" >Supplier Name: </label>
                                            <div class="col-sm-8">
                                                <select name="supplier_id" id="supplier_id" class="form-control select2" >
                                                   <option value="">Select Supplier</option>

                                                   @foreach($suppliers as $supplier)

                                                   <option value="{{$supplier->id}}">{{$supplier->name}}</option>

                                                   @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4  control-label col-form-label">Category Name: </label>
                                            <div class="col-sm-8">
                                                <select name="category_id" id="category_id" class="form-control select2" >
                                                   <option value="">Select Category</option>
                                                </select>
                                           </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-4  control-label col-form-label" >Product Name: </label>
                                            <div class="col-sm-8">
                                               <select name="product_id" id="product_id" class="form-control select2" required>
                                                   <option value="">Select Product</option>
                                               </select>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="border-top text-right">
                                        <div class="card-body">
                                            <a style="border-radius:4px;color:white;" class="btn btn-success addeventmore"><i class="fas fa-plus-circle"></i> Add Item</a>
                                        </div>
                                    </div> 
                                    <div class="card-body" >
                                        <form action="{{route ('purchases.store')}}" method="post" id="myForm">
                                            @csrf
                                            <table border="1" class="table-sm table-broder" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th  width="20%">Category</th>
                                                        <th width="30%">Product Name</th>
                                                        <th width="10%">Pc/Kg</th>
                                                        <th width="16%">Unit Price</th>
                                                        <th>Description</th>
                                                        <th width="20%">Total Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="addRow" id="addRow">
                                                    
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="5"></td>
                                                        <td>
                                                            <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color:#D8FDBA">
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                                <br>
                                                <div class="form-group text-right">
                                                    <button style="border-radius:4px;" type="submit" class="btn btn-primary" id="soteButton"><i class="fas fa-shopping-basket"></i>  Purchase Save</button>
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
<!---category--->
<script type="text/javascript">
   $(function(){
        $(document).on('change','#supplier_id',function(){
            var supplier_id = $(this).val();
            $.ajax({
                url:"{{route('get_category')}}",
                type:"GET",
                data:{supplier_id:supplier_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html +='<option value="'+v.category_id+'">'+v.category.name+'</option>';
                    });
                    $('#category_id').html(html);
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
        <input type="hidden" name="date[]" value="@{{date}}">
        <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
        <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{category_name}}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{product_name}}
        </td>
        <td>
            <input type="number" min="1" class="form-control form-control-sm text-right buying_qty" name="buying_qty[]" value="1">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
        </td>
        <td>
            <input type="text" name="description[] class="form-control form-control-sm">
        </td>
        <td>
            <input class="form-control form-control-sm text-right buying_price" name="buying_price[]" value="0" readonly>
        </td>
        <td><i class="btn btn-danger btn-md fa fa-window-close removeeventmore"></i></td>
    </tr>
</script>

<!---add item 2--->

<script type="text/javascript">
    $(document).ready(function (){
        $(document).on("click",".addeventmore", function (){
            var date = $('#date').val();
            var purchase_no = $('#purchase_no').val();
            var supplier_id = $('#supplier_id').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();

            if(date==''){
                $.notify("Date is required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if(purchase_no==''){
                $.notify("purchase_no is required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if(supplier_id==''){
                $.notify("supplier_id is required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if(category_id==''){
                $.notify("category_id is required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if(product_id==''){
                $.notify("product_id is required", {globalPosition: 'top right',className: 'error'});
                return false;
            }

           var source = $("#document-template").html();
           var template = Handlebars.compile(source);
           var data = {
                    data:data,
                    purchase_no:purchase_no,
                    supplier_id:supplier_id,
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

        $(document).on('keyup click','.unit_price,.buying_qty',function(){
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.buying_qty").val();
            var total = unit_price * qty;
            $(this).closest("tr").find("input.buying_price").val(total);
            totalAmountPrice();
        });

        

 //calculate sum of ammount in invoice

    function totalAmountPrice(){
        var sum=0;
        $(".buying_price").each(function(){
            var value = $(this).val();
            if(!isNaN(value) && value.length != 0) {
                sum += parseFloat(value);
            }
        });

        $('#estimated_amount').val(sum);
    }
    });
    
</script>


@endsection
