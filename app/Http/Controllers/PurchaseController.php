<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Logo;
use App\Models\Favicon;
use App\Models\Setting;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function view() 
    {
        $logo = Logo::first();
        $favicon = Favicon::first();
        $setting = Setting::first();
        $allData = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('page.purchase.view_purchase', compact('allData','logo','favicon','setting'));
    }
    public function add()
  {
     $data['logo'] = Logo::first();
     $data['favicon'] = Favicon::first();
     $data['setting'] = Setting::first();
     $data['suppliers'] = Supplier::all(); 
     $data['categories'] = Category::all();
     $data['products'] = Product::all();
      return view('page.purchase.add_purchase',$data);

  }
  public function store(Request $request)
  {
    if ($request->category_id == null) {
          return redirect()->back()->with('error','Sorry! You do not select any item');
      }else{
        $count_category = count($request->category_id);
        for ($i=0; $i <$count_category ; $i++) { 
            $purchase = new Purchase();
            $purchase->date = \Carbon\Carbon::parse($request->date[$i]);
            $purchase->purchase_no = $request->purchase_no[$i];
            $purchase->supplier_id = $request->supplier_id[$i];
            $purchase->category_id = $request->category_id[$i];
            $purchase->product_id = $request->product_id[$i];
            $purchase->buying_qty = $request->buying_qty[$i];
            $purchase->unit_price = $request->unit_price[$i];
            $purchase->buying_price = $request->buying_price[$i];
            $purchase->description = $request->description[$i];
            // $purchase->created_by = Auth::user()->id;
            $purchase->status= '0';
            $purchase->save();
        }
      }

      return redirect()->route('purchases.view')->with('success','Data Save Successfully');
  }
   public function delete($id)
  {
      $purchase = Purchase::find($id);
      $purchase->delete();
      return redirect()->route('purchases.view')->with('success', 'successfully deleted purchase');
  }
  public function purchaseApproval()
  {
    $logo = Logo::first();
    $favicon = Favicon::first();
    $setting = Setting::first();
      $allData = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status','0')->get();
      return view('page.purchase.view_approval', compact('allData','logo','favicon','setting'));
  }
  public function approve($id)
  {
    $purchase = Purchase::find($id);
    $product = Product::where('id',$purchase->product_id)->first();
    $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
    $product->quantity = $purchase_qty;
    if ($product->save()) {
      DB::table('purchases')->where('id', $id)->update(['status' =>1]);
    }
    return redirect()->route('purchases.approval.list')->with('success','Data Approval Successfully');
  }
}
