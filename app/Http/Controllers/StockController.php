<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Logo;
use App\Models\Favicon;
use App\Models\Setting;
use PDF;

class StockController extends Controller
{
    public function report()
    {   
        $logo = Logo::first();
        $favicon = Favicon::first();
        $setting = Setting::first();
        $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('page.stock.stock_report',compact('allData','logo','favicon','setting'));
    }
    public function productPdf()
    {
        $data['allData'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
          
        $pdf = PDF::loadView('page.pdf.products_pdf', $data);
    
        return $pdf->stream('document.pdf');
    }
    public function supplierProductWise()
    {
        $data['logo'] = Logo::first();
        $data['favicon'] = Favicon::first();
        $data['setting'] = Setting::first();
        $data['suppliers'] = Supplier::all();
        $data['categories'] = Category::all();
        return view('page.stock.supplier_product_wise_report', $data);
    }
    public function supplierWisePdf(Request $request)
    {
        $data['allData'] = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
          
        $pdf = PDF::loadView('page.pdf.supplier_wise_pdf', $data);
    
        return $pdf->stream('document.pdf');
    }
    public function productWisePdf(Request $request)
    {
        $data['product'] = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
          
        $pdf = PDF::loadView('page.pdf.product_wise_pdf', $data);
    
        return $pdf->stream('document.pdf');
    }
}
