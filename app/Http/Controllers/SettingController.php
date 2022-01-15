<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Favicon;
use App\Models\Setting;

class SettingController extends Controller
{
   public function view() 
  { 
    $allData = Setting::all();
    $setting = Setting::first();
    $logo = Logo::first();
    $favicon = Favicon::first();
      return view('page.setting.view_setting',compact('allData','logo','favicon','setting'));
  }
  public function edit($id)
  {
      $logo = Logo::first();
      $favicon = Favicon::first();
      $setting = Setting::first();
      $editData = Setting::find($id);
      return view('page.setting.edit_setting',compact('editData','logo','favicon','setting'));
  }
  public function update(Request $request,$id)
  {
      $setting = Setting::find($id);
      $setting->name = $request->name;
      $setting->phone = $request->phone;
      $setting->phone1 = $request->phone1;
      $setting->address = $request->address;
      $setting->save();
      return redirect()->route('settings.view')->with('success', 'Setting updated successfully');
  }
}
