<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Favicon;
use App\Models\Setting;
use Image;

class logoController extends Controller
{
       public function view(){
        $allData = Logo::all();
        $favicon = Favicon::first();
        $setting = Setting::first();
        return view('page.logo.logo_view',compact('allData','favicon','setting'));
    }
    public function edit($id)
    {
        $editData = Logo::find($id);
        $logo = Logo::first();
        $favicon = Favicon::first();
        $setting = Setting::first();
        return view('page.logo.add_logo',compact('editData','logo','favicon','setting'));
    }
    public function update(Request $request,$id)
    {
       $data = Logo::find($id);
       if ($request->file('image')) {
          $file = $request->file('image');
           $filename =date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('assets/images/logo'),$filename);
           $data['image']= $filename;
        }
       $data->save();
       return redirect()->route('logos.view')->with('success', 'Logo saved successfully');
    }
}
