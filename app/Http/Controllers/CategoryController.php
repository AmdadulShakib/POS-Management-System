<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\logo;
use App\Models\Favicon;
use App\Models\Setting;

class CategoryController extends Controller
{
   public function view() 
  { 
    $allData = Category::all();
    $logo = Logo::first();
    $favicon = Favicon::first();
    $setting = Setting::first();
      return view('page.category.view_category',compact('allData','logo','favicon','setting'));
  }
  public function add()
  {
      $logo = Logo::first();
      $favicon = Favicon::first();
      $setting = Setting::first();
      return view('page.category.add_category',compact('logo','favicon','setting'));
  }
  public function store(Request $request)
  {
      $category = new Category();
      $category->name = $request->name;
      $category->save();
      return redirect()->route('categories.view')->with('success', 'Category saved successfully');
  }
  public function edit($id)
  {
      $logo = Logo::first();
      $favicon = Favicon::first();
      $setting = Setting::first();
      $editData = Category::find($id);
      return view('page.category.edit_category',compact('editData','logo','favicon','setting'));
  }
  public function update(Request $request,$id)
  {
      $category = Category::find($id);
      $category->name = $request->name;
      $category->save();
      return redirect()->route('categories.view')->with('success', 'Category updated successfully');
  }
  public function delete($id)
  {
      $category = Category::find($id);
      $category->delete();
      return redirect()->route('categories.view')->with('success', 'successfully deleted Category');
  }
}
