 @extends('page.layouts.master')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Product Mannage</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products View</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
 <div class="border-top text-right">
    <div class="card-body">
        <a href="{{route ('products.add')}}"><button style="border-radius:4px;"  type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Product</button></a>
     </div>
 </div>
<div style="padding:0px 20px;" class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead  style="background-color:#5964FF; color: white;font-weight:200;">
                                <tr>
                                    <th>SL</th>
                                    <th>Supplier Name</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Product price</th>
                                    <th width="12%">Action </th>
                                </tr>
                            </thead>
                                 @foreach($allData as $key => $product)
                                  @php
                                    $count_product = App\Models\Purchase::where('product_id',$product->id)->count();
                                  @endphp
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$product['supplier']['name']}}</td>
                                    <td>{{$product['category']['name']}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}} TK</td> 
                                     <td> 
                                     <a  style="border-radius:4px;" href="{{ route('products.edit', $product->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                     @if($count_product<1)
                                     <a  style="border-radius:4px;" title="Delete" href="{{ route('products.delete', $product->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                     @endif
                                    </td>
                                </tr>
                                @if($count_product<0)
                                <tr>
                                    <td class="text-center" colspan="100%">@lang('Data not found')</td>
                                </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 @endsection