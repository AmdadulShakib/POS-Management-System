<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Logo;
use App\Models\Favicon;
use App\Models\Setting;
use PDF;

class CustomerController extends Controller
{
    public function view()
  {  

    $logo = Logo::first();
    $favicon = Favicon::first(); 
    $setting = Setting::first(); 
    $allData = Customer::orderBy('id','desc')->get();
      return view('page.customer.view_customer',compact('allData','logo','favicon','setting'));
  }
  public function add()
  {
      $logo = Logo::first();
      $favicon = Favicon::first();
      $setting = Setting::first();
      return view('page.customer.add_customer',compact('logo','favicon','setting'));
  }
  public function store(Request $request)
  {
      $customer = new Customer();
      $customer->name = $request->name;
      $customer->email = $request->email;
      $customer->phone = $request->phone;
      $customer->address = $request->address;
      $customer->save();
      return redirect()->route('customers.view')->with('success', 'Data saved successfully');
  }
  public function edit($id)
  {

      $logo = Logo::first();
      $favicon = Favicon::first();
      $setting = Setting::first();
      $editData = Customer::find($id);
      return view('page.customer.edit_customer',compact('editData','logo','favicon','setting'));
  }
  public function update(Request $request,$id)
  {
      $customer = Customer::find($id);
      $customer->name = $request->name;
      $customer->email = $request->email;
      $customer->phone = $request->phone;
      $customer->address = $request->address;
      $customer->save();
      return redirect()->route('customers.view')->with('success', 'Data updated successfully');
  }
  public function delete($id)
  {
      $customer = Customer::find($id);
      $customer->delete();
      return redirect()->route('customers.view')->with('success', 'successfully deleted data');
  }
  public function crditCustomer()
  {
    $logo = Logo::first();
    $favicon = Favicon::first();
    $setting = Setting::first();
    $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
    return view('page.customer.crdit_customer',compact('allData','logo','favicon','setting'));
  }
  public function crditCustomerPdf()
  {
    $data['allData'] = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
    $pdf = PDF::loadView('page.pdf.crdit_customer_pdf', $data);
    
        return $pdf->stream('document.pdf');
  }
  public function editInvoice($invoice_id)
  {
    $logo = Logo::first();
    $favicon = Favicon::first();
    $setting = Setting::first();
    $payment = Payment::where('invoice_id',$invoice_id)->first();
    return view('page.customer.edit_invocie',compact('payment','logo','favicon','setting'));
  }
  public function updateInvoice(Request $request,$invoice_id)
  {
    if ($request->new_paid_amount<$request->paid_amount) {
      return redirect()->back()->with('error','Sorry! You have paid maximum value');
    }else{
      $payment = Payment::where('invoice_id',$invoice_id)->first();
      $payment_details = new PaymentDetail();
      $payment->paid_status = $request->paid_status;
      if ($request->paid_status=='full_paid') {
        $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
        $payment->due_amount = '0';
        $payment_details->current_paid_amount = $request->new_paid_amount;
      }elseif($request->paid_status=='partial_paid'){
        $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
        $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
        $payment_details->current_paid_amount = $request->paid_amount;
      }
      $payment->save();
      $payment_details->invoice_id = $invoice_id;
      $payment_details->date = date('Y-m-d',strtotime($request->date));
      $payment_details->save();
      return redirect()->route('crdit.customers')->with('success','Invoice Successfully Updated');
    }
  }
  public function pdfInvoice($invoice_id)
  {
    $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
    $pdf = PDF::loadView('page.pdf.crdit_customer_details_pdf', $data);
    return $pdf->stream('document.pdf');
  }
  public function paidCustomer()
  {
    $logo = Logo::first();
    $favicon = Favicon::first();
    $setting = Setting::first();
    $allData = Payment::where('paid_status','!=','full_due')->get();
    return view('page.customer.paid_customer',compact('allData','logo','favicon','setting'));
  }
  public function paidCustomerPdf()
  {
    $data['allData'] = Payment::where('paid_status','!=','full_due')->get();
    $pdf = PDF::loadView('page.pdf.paid_customer_pdf', $data);
    
        return $pdf->stream('document.pdf');
  }
}
