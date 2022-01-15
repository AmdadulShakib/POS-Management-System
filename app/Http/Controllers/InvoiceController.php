<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Customer;
use App\Models\Logo;
use App\Models\Favicon;
use App\Models\Setting;
use Carbon\Carbon;
use DB;
use PDF;
class InvoiceController extends Controller
{
    public function view()
    {
         $logo = Logo::first();
         $favicon = Favicon::first();
         $setting = Setting::first();
         $allData = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status','1')->get();
         return view('page.invoice.view_invoice', compact('allData','logo','favicon','setting'));
    }
    public function add()
  { 
      $data['logo'] = Logo::first();
      $data['favicon'] = Favicon::first();
      $data['setting'] = Setting::first();
     $data['categories'] = Category::all();
     $invoice_data = Invoice::orderBy('id','desc')->first();
     if($invoice_data == null){
        $firstReg = '0';
        $data['invoice_no'] = $firstReg+1;
     }else{
        $invoice_data = Invoice::orderBy('id','desc')->first()->invoice_no;
        $data['invoice_no'] = $invoice_data+1;
     }
     $data['customers'] = Customer::all();
     $data['date'] = date('Y-m-d');
      return view('page.invoice.add_invoice',$data);

  }
  public function store(Request $request)
  {
     if ($request->category_id == null) {
        return redirect()->back()->with('error','Sorry! You don not select any Product');
     }else{
      if ($request->paid_amount>$request->estimated_amount) {
         return redirect()->back()->with('error','Sorry! Paid amount is maximum than total price');
      }else{
         $invoice = new Invoice();
         $invoice->invoice_no = $request->invoice_no;
         $invoice->date = Carbon::parse($request->date);
         $invoice->description = $request->description;
         $invoice->status = '0';
         
         DB::transaction(function() use($request,$invoice){
            if ($invoice->save()) {
               $count_category = count($request->category_id);
               for ($i=0; $i <$count_category; $i++) { 
                  $invoice_details = new InvoiceDetail();
                  $invoice_details->date = Carbon::parse($request->date);
                  $invoice_details->invoice_id = $invoice->id;
                  $invoice_details->category_id = $request->category_id[$i];
                  $invoice_details->product_id = $request->product_id[$i];
                  $invoice_details->selling_qty = $request->selling_qty[$i];
                  $invoice_details->unit_price = $request->unit_price[$i];
                  $invoice_details->selling_price = $request->selling_price[$i];
                  $invoice_details->status = '0';
                  $invoice_details->save();
               }
               if ($request->customer_id == '0') {
                  $customer = new Customer();
                  $customer->name = $request->name;
                  $customer->phone = $request->phone;
                  $customer->address = $request->address;
                  $customer->save();
                  $customer_id = $customer->id;
               }else{
                  $customer_id = $request->customer_id;
               }
               $payment = new Payment();
               $payment_details = new PaymentDetail();
               $payment->invoice_id = $invoice->id;
               $payment->customer_id = $customer_id;
               $payment->paid_status = $request->paid_status;
               $payment->paid_amount = $request->paid_amount;
               $payment->discount_amount = $request->discount_amount;
               $payment->total_amount = $request->estimated_amount;
               if ($request->paid_status=='full_paid') {
                  $payment->paid_amount = $request->estimated_amount;
                  $payment->due_amount = '0';
                  $payment_details->current_paid_amount = $request->estimated_amount;
               }elseif($request->paid_status=='full_due'){
                  $payment->paid_amount = '0';
                  $payment->due_amount = $request->estimated_amount;
                  $payment_details->current_paid_amount = '0';
               }elseif($request->paid_status=='partial_paid'){
                  $payment->paid_amount = $request->paid_amount;
                  $payment->due_amount = $request->estimated_amount-$request->paid_amount;
                  $payment_details->current_paid_amount = $request->paid_amount;
            }
            $payment->save();
            $payment_details->invoice_id = $invoice->id;
            $payment_details->date = \Carbon\Carbon::parse($request->date);
            $payment_details->save();
         }
         });
     }
  }
  return redirect()->route('invoices.pending.list')->with('success','Data Save Successfully');
}
public function invoicePending()
  {
      $logo = Logo::first();
      $favicon = Favicon::first();
      $setting = Setting::first();
      $allData = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status','0')->get();
      return view('page.invoice.view_approval', compact('allData','logo','favicon','setting'));
  }
   public function delete($id)
  {
      $invoice = Invoice::find($id);
      $invoice->delete();
      InvoiceDetail::where('invoice_id',$invoice->id)->delete();
      Payment::where('invoice_id',$invoice->id)->delete();
      PaymentDetail::where('invoice_id',$invoice->id)->delete();
      return redirect()->route('invoices.pending.list')->with('success', 'successfully deleted invoice');
  }
  public function approve($id)
  {
      $logo = Logo::first();
      $favicon = Favicon::first();
      $setting = Setting::first();
     $invoice = Invoice::with(['invoice_detalis'])->find($id);
     return view('page.invoice.invoice_approval',compact('invoice','logo','favicon','setting'));
  }
  public function aprovalStore(Request $request,$id)
  {
     foreach ($request->selling_qty as $key =>$val){
      $invoice_details = InvoiceDetail::where('id',$key)->first();
      $product = Product::where('id',$invoice_details->product_id)->first();
      if ($product->quantity < $request->selling_qty[$key]) {
         return redirect()->back()->with('error','Sorry! You approve maximum value');
      }
     }
     $invoice = Invoice::find($id);
     $invoice->status = '1';
     DB::transaction(function() use($request,$invoice,$id){
      foreach ($request->selling_qty as $key =>$val) {
         $invoice_details = InvoiceDetail::where('id',$key)->first();
         $invoice_details->status = '1';
         $invoice_details->save();
         $product = Product::where('id',$invoice_details->product_id)->first();
         $product->quantity = ((float)$product->quantity)-((float)$request->selling_qty[$key]);
         $product->save();
      }
      $invoice->save();
     });
     return redirect()->route('invoices.pending.list')->with('success','Invoice Successfully Approved');
  }
  public function printInvoiceList()
  {
       $logo = Logo::first();
      $favicon = Favicon::first();
      $setting = Setting::first();
     $allData = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status','1')->get();
      return view('page.invoice.pos_invoice_list', compact('allData','logo','favicon','setting'));
  }
   public function printInvoice($id)
    {
        $data['invoice'] = Invoice::with(['invoice_detalis'])->find($id);
          
        $pdf = PDF::loadView('page.pdf.invoice_pdf', $data);
    
        return $pdf->stream('document.pdf');
    }
    public function dailyReport()
    {
      $logo = Logo::first();
      $favicon = Favicon::first();
      $setting = Setting::first();
       return view('page.invoice.daily_invoice_report', compact('logo','favicon','setting'));
    }
    public function dailyReportPdf(Request $request)
    {
       $sdate = \Carbon\Carbon::parse($request->start_date);
       $edate = \Carbon\Carbon::parse($request->end_date);
       $data['allData'] = Invoice::whereBetween('date',[$sdate,$edate])->where('status','1')->get();
       $data['start_date'] = \Carbon\Carbon::parse($request->start_date);
       $data['end_date'] = \Carbon\Carbon::parse($request->end_date);
       $pdf = PDF::loadView('page.pdf.daily_invoice_report_pdf', $data);
    
        return $pdf->stream('document.pdf');
    }
}
