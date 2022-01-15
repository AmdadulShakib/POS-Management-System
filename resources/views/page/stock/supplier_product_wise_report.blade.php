 @extends('page.layouts.master')
  @section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Stock Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stock Supplier/Product Wise Report</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> 
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card  text-center">
                <div class="card-body">
                    <strong>Supplier Wise Report</strong>
                    <input type="radio" name="supplier_product_wise_report" value="supplier_wise" class="search_value"> &nbsp;&nbsp;
                    <strong>Product Wise Report</strong>
                    <input type="radio" name="supplier_product_wise_report" value="product_wise" class="search_value">
                </div>
            </div>
            <div style="display:none;" class="show_supplier">
                <form method="GET" action="{{route ('supplier.wise.pdf')}}" class="form-control" id="supplierWiseReport" target="_blank">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Supplier Name :</label>
                            <select style="width: 100%;" name="supplier_id" class="form-control select2">
                                <option value="">Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4" style="padding-top:29px;">
                            <button style="border-radius:4px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i>  Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div style="display:none;" class="show_product">
                <form method="GET" action="{{route ('product.wise.pdf')}}" class="form-control" id="productWiseReport" target="_blank">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="lname" class="col-md-12 control-label col-form-label">Category Name: </label>
                            <div class="col-md-12">
                             <select  style="width: 100%;" name="category_id" id="category_id" class="form-control select2">
                                   <option value="">Select Category</option>

                                   @foreach($categories as $category)

                                   <option value="{{$category->id}}"> {{$category->name}} </option>

                                   @endforeach
                               </select>
                           </div>
                       </div>
                        <div class="col-md-12">
                            <label for="lname" class="col-sm-4 control-label col-form-label">Product Name: </label>
                            <div class="col-md-12">
                             <select  style="width: 100%;" name="product_id" id="product_id" class="form-control select2">
                                   <option value="">Select Product</option>

                               </select>
                           </div>
                       </div>
                        <div class="col-md-4" style="padding-top:29px;">
                            <button style="border-radius:4px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i>  Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on('change','.search_value',function(){
        var search_value = $(this).val();
        if (search_value == 'supplier_wise') {
            $('.show_supplier').show();
        }else{
            $('.show_supplier').hide();
        }
        if (search_value == 'product_wise') {
            $('.show_product').show();
        }else{
            $('.show_product').hide();
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#supplierWiseReport').validate({
            ignore:[],
            errorPlacement: function(error, element){
                if (element.attr("name") == "supplier_id" ){ error.insertAfter(
                    element.next()); }
                    else{error.insertAfter(element);}
            },
            errorClass:'text-danger',
            validClass:'text-success',
          rules: {
              supplier_id: {
                required: true,
            }
            },
            massage: {
                
            },
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#productWiseReport').validate({
            ignore:[],
            errorPlacement: function(error, element){
                if (element.attr("name") == "category_id" ){ error.insertAfter(
                    element.next()); }
                    else if (element.attr("name") == "product_id" ){ error.insertAfter(
                    element.next()); }
                    else{error.insertAfter(element);}
            },
            errorClass:'text-danger',
            validClass:'text-success',
          rules: {
              category_id: {
                required: true,
            },
              product_id: {
                required: true,
            }
            },
            massage: {
                
            },
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
 @endsection