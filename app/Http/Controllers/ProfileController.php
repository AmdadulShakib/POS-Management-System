<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Logo;
use App\Models\Favicon;
use App\Models\Setting;
use Auth;

class ProfileController extends Controller
{
    public function view(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $logo = Logo::first();
        $favicon = Favicon::first();
        $setting = Setting::first();
        return view('page.user.view_profile',compact('user','logo','favicon','setting'));
    }
    public function edit()
    {
       $id = Auth::user()->id;
        $editData = User::find($id);
        $logo = Logo::first();
        $favicon = Favicon::first();
        $setting = Setting::first();
        return view('page.user.edit_profile',compact('editData','logo','favicon','setting'));
    }
    public function update(Request $request){
      $data = User::find(Auth::user()->id);
      $data->name = $request->name;
      $data->email = $request->email;
      $data->mobile = $request->mobile;
      $data->address = $request->address;
      $data->gender = $request->gender;
        if ($request->file('image')) {
          $file = $request->file('image');
           @unlink(public_path('assets/images/admin/'.$data->image));
           $filename =date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('assets/images/admin/'),$filename);
           $data['image']= $filename;
        }
      $data->save();
        return redirect()->route('profiles.view')->with('success', 'Profile Updated successfully');
      }
      public function passwordView()
      {
            $logo = Logo::first();
            $favicon = Favicon::first();
          return view('page.user.edit_password',compact('logo','favicon'));
      }
      public function passwordUpdate(Request $request)
      {
          if (Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])) {
              $user = User::find(Auth::user()->id);
              $user->password = bcrypt($request->new_password);
              $user->save();
              return redirect()->route('profiles.view')->with('success','Password changed successfully');
          }else{
            return redirect()->back()->with('error','Sorry! you current password dost not match');
          }
      }
}
