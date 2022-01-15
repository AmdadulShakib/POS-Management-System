<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\ProductImage;
use App\Models\Logo;
use App\Models\Favicon;
use App\Models\Setting;
use Image;

class ProductController extends Controller
{
    public function view()
  { 
    $logo = Logo::first();
    $favicon = Favicon::first(); 
    $setting = Setting::first();  
    $allData = Product::orderBy('id','desc')->get();
      return view('page.product.view_product',compact('allData','logo','favicon','setting'));
  }
  public function add()
  { 
    $data['logo'] = Logo::first();
    $data['favicon'] = Favicon::first();
    $data['setting'] = Setting::first();
     $data['suppliers'] = Supplier::all(); 
     $data['categories'] = Category::all(); 
      return view('page.product.add_product',$data);

  }
  public function store(Request $request)
  {
      $product = new Product();
      $product->supplier_id = $request->supplier_id;
      $product->category_id = $request->category_id;
      $product->name = $request->name;
      $product->price = $request->price;
      $product->quantity = '0';
      $product->save();
      return redirect()->route('products.view')->with('success', 'Product saved successfully');
  }
  public function edit($id)
  { 
    $data['logo'] = Logo::first();
    $data['favicon'] = Favicon::first();
    $data['setting'] = Setting::first();
      $data['editData'] = Product::find($id);
      $data['suppliers'] = Supplier::all(); 
      $data['categories'] = Category::all();  
      return view('page.product.edit_product',$data);
  }
  public function update(Request $request,$id)
  {
      $product = Product::find($id);
      $product->supplier_id = $request->supplier_id;
      $product->category_id = $request->category_id;
      $product->name = $request->name;
      $product->save();
      return redirect()->route('products.view')->with('success', 'Prodcut updated successfully');
  }
  public function delete($id)
  {
      $product = Product::find($id);
      $product->delete();
      return redirect()->route('products.view')->with('success', 'successfully deleted Product');
  }
}
