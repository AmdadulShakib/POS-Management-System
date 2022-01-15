<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Logo;
use App\Models\Favicon;
use App\Models\Setting;
use DB;

class PagesController extends Controller
{

  public function index()
  {
    $logo = Logo::first();
    $favicon = Favicon::first();
    $setting = Setting::first();
    $totalCustomers = Customer::count();
    $totalPurchase = Purchase::count();
    $totalProducts = Purchase::count();
    $totalInvoices = Invoice::count();
    $totalSuppliers = Supplier::count();
    $totalCategorys = Category::count();

    $customers = Customer::select(DB::raw('COUNT(*) as count'))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
    $months = Customer::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');

    $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
    foreach($months as $index => $month)
    {
        $datas[$month] = $customers[$index];
    }
    return view('page.index',compact('datas','totalCustomers','totalPurchase','totalProducts','totalInvoices','totalSuppliers','totalCategorys','logo','favicon','setting'));
  }

}
