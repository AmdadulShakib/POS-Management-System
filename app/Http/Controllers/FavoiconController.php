<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favicon;
use App\Models\Logo;
use App\Models\Setting;
use Image;

class FavoiconController extends Controller
{
    public function view(){
        $logo = Logo::first();
        $setting = Setting::first();
        $allData = Favicon::all();
        return view('page.favicon.favicon_view',compact('allData','logo','setting'));
    }
    public function edit($id)
    {   $editData = Favicon::find($id);
        $logo = Logo::first();
        $favicon = Favicon::first();
        $setting = Setting::first();
        return view('page.favicon.add_favicon',compact('editData','logo','favicon','setting'));
    }
    public function update(Request $request,$id)
    {
       $data = Favicon::find($id);
       if ($request->file('image')) {
          $file = $request->file('image');
           $filename =date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('assets/images/favicon'),$filename);
           $data['image']= $filename;
        }
       $data->save();
       return redirect()->route('favicons.view')->with('success', 'Favicon saved successfully');
    }
}
