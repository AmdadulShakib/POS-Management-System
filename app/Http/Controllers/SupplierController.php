<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Logo;
use App\Models\Favicon;
use App\Models\Setting;

class SupplierController extends Controller
{
  public function view()
  {
    $logo = Logo::first();
    $favicon = Favicon::first();
    $setting = Setting::first();
     $allData = Supplier::all();
      return view('page.supplier.view_supplier',compact('allData','logo','favicon','setting'));
  }
  public function add()
  {
    $logo = Logo::first();
    $favicon = Favicon::first();
    $setting = Setting::first();
      return view('page.supplier.add_supplier',compact('logo','favicon','setting'));
  }
  public function store(Request $request)
  {
      $supplier = new Supplier();
      $supplier->name = $request->name;
      $supplier->email = $request->email;
      $supplier->phone = $request->phone;
      $supplier->address = $request->address;
      $supplier->save();
      return redirect()->route('suppliers.view')->with('success', 'Data saved successfully');
  }
  public function edit($id)
  {
    $logo = Logo::first();
    $favicon = Favicon::first();
    $setting = Setting::first();
      $editData = Supplier::find($id);
      return view('page.supplier.edit_supplier',compact('editData','logo','favicon','setting'));
  }
  public function update(Request $request,$id)
  {
      $supplier = Supplier::find($id);
      $supplier->name = $request->name;
      $supplier->email = $request->email;
      $supplier->phone = $request->phone;
      $supplier->address = $request->address;
      $supplier->save();
      return redirect()->route('suppliers.view')->with('success', 'Data updated successfully');
  }
  public function delete($id)
  {
      $supplier = Supplier::find($id);
      $supplier->delete();
      return redirect()->route('suppliers.view')->with('success', 'successfully deleted data');
  }

}
