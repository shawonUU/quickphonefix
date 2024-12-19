<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Service;
use App\Models\Customer;
use App\Mail\PlaceOrderMail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // return $request->all();


        $services = Service::join('users','users.id','=','services.repaired_by');
        
        if ($request->from != "" && $request->to != "") {
            $from = date('Y-m-d 00:00:00', strtotime($request->from));
            $to = date('Y-m-d 23:59:59', strtotime($request->to));
            $services = $services->whereBetween('services.created_at', [$from, $to]);
        }

        if ($request->service_type != "") {
            if($request->service_type=="paid"){
                $services = $services->where('services.due_amount', '=', '0');
            }
            if($request->service_type=="due"){
                $services = $services->where('services.due_amount', '>', '0');
            }
        }

        if ($request->serach_by != "" && $request->key != "") {
           $services = $services->where('services.'.$request->serach_by, 'like', '%' . $request->key . '%');
        }


        $services = $services->where('services.status','0');
        $services = $services->select('services.*','users.name as repaired_by')->orderBy('id','desc')->get();

        $users = lib_serviceMan();
        if($request->search_for == 'pdf'){
            $pdf = Pdf::loadView('pdf.services', compact('services','users','request'));
            return $pdf->download('Services.pdf');
        }
        return view('frontend.pages.service.index',compact('services','users','request'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users  = User::get();
        $products = Product::where('status','1')->where('type','1')->get();
        return view('frontend.pages.service.create',compact('users','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
       $attributes = $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required|numeric',
            'address' => 'nullable',
            'product_name' => 'required',
            'product_number' => 'nullable',
            'bill' => 'required|numeric',
            'paid_amount' => 'nullable|numeric',
            'due_amount' => 'nullable|numeric',
            'payment_method_id' => 'nullable|numeric',
            'warranty_duration' => 'required|numeric',
            'repaired_by' => 'required|numeric',
        ];
        $validation = Validator::make($attributes, $rules);
        if ($validation->fails()) {
            return redirect()->back()->with(['error' => getNotify(4)])->withErrors($validation)->withInput();
        }

        if(!is_numeric($request->product_name)){
            $product = new Product;
            $product->name = $request->product_name;
            $product->type = '1';
            $product->save();
        }else{
            $product = Product::where('id', $request->product_name)->first();
            if($product)$request->product_name =  $product->name;
        }

        $customerByPhone = Customer::where('phone', $request->phone)->first();
        $customerByEmail = Customer::where('email', $request->email)->first();
        $customer =  new Customer;

        if((!$customerByPhone && $customerByEmail)){
            $customer = $customerByEmail;
        }elseif(($customerByPhone && !$customerByEmail)){
            $customer = $customerByPhone;
        }elseif($customerByPhone && $customerByEmail && $customerByPhone->id == $customerByEmail->id){
            $customer = $customerByPhone;
        }elseif($customerByPhone && $customerByEmail && $customerByPhone->id != $customerByEmail->id){
            return redirect()->back()->with(['error' => 'The email is added for another customer.'])->withInput();
        }

        $customer->name = $request->name;
        if($request->email != "" )$customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        $service = new Service;
        $service->customer_id = $customer->id;
        $service->name = $customer->name;
        $service->phone = $customer->phone;
        $service->email = $customer->email;
        $service->address = $customer->address;
        $service->product_name = $request->product_name;
        $service->product_number = $request->product_number;
        $service->bill = $request->bill;
        $service->paid_amount = $request->paid_amount;
        $service->due_amount = max(0,$request->bill-$request->paid_amount);
        $service->details = $request->details;
        $service->warranty_duration = $request->warranty_duration;
        $service->repaired_by = $request->repaired_by;
        $service->status = '0';
        $service->save();

        if($request->paid_amount > 0){
            $payment = new Payment;
            $payment->payment_for = '1';
            $payment->customer_id = $customer->id;
            $payment->bill_id = $service->id;
            $payment->payment_method_id = $request->payment_method_id;
            $payment->amount = $request->paid_amount;
            $payment->save();
        }



        $service = Service::join('customers','customers.id','=','services.customer_id')
                    ->where('services.id',$service->id)
                    ->select('services.*')
                    ->first();
        $serviceMans = lib_serviceMan();

        Mail::to($request->email)->send(new PlaceOrderMail($service, $serviceMans));
        


        return redirect()->back()->with(['success' => getNotify(1)]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::join('customers','customers.id','=','services.customer_id')
                    ->where('services.id',$id)
                    ->select('services.*')
                    ->first();
        if(!$service)abort(404);
        $products = Product::where('status','1')->where('type','1')->get();
        $serviceMans = lib_serviceMan();

        return view('frontend.pages.service.edit',compact('service','serviceMans','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::where('id',$id)->first();
        if(!$service)abort(404);

        $attributes = $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required|numeric',
            'address' => 'nullable',
            'product_name' => 'required',
            'product_number' => 'nullable',
            'bill' => 'required|numeric',
            'warranty_duration' => 'required|numeric',
            'repaired_by' => 'required|numeric',
        ];
        $validation = Validator::make($attributes, $rules);
        if ($validation->fails()) {
            return redirect()->back()->with(['error' => getNotify(4)])->withErrors($validation)->withInput();
        }

        if(!is_numeric($request->product_name)){
            $product = new Product;
            $product->name = $request->product_name;
            $product->save();
        }else{
            $product = Product::where('id', $request->product_name)->first();
            if($product)$request->product_name =  $product->name;
        }

        $customerByPhone = Customer::where('phone', $request->phone)->first();
        $customerByEmail = Customer::where('email', $request->email)->first();
        $customer =  new Customer;

        if((!$customerByPhone && $customerByEmail)){
            $customer = $customerByEmail;
        }elseif(($customerByPhone && !$customerByEmail)){
            $customer = $customerByPhone;
        }elseif($customerByPhone && $customerByEmail && $customerByPhone->id == $customerByEmail->id){
            $customer = $customerByPhone;
        }elseif($customerByPhone && $customerByEmail && $customerByPhone->id != $customerByEmail->id){
            return redirect()->back()->with(['error' => 'The email is added for another customer.'])->withInput();
        }

        $customer->name = $request->name;
        if($request->email != "" )$customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        $service->customer_id = $customer->id;
        $service->name = $customer->name;
        $service->phone = $customer->phone;
        $service->email = $customer->email;
        $service->address = $customer->address;
        $service->product_name = $request->product_name;
        $service->product_number = $request->product_number;
        $service->bill = $request->bill;
        $service->due_amount = max(0,$request->bill-$service->paid_amount);
        $service->details = $request->details;
        $service->warranty_duration = $request->warranty_duration;
        $service->repaired_by = $request->repaired_by;
        $service->update();

        return redirect()->back()->with(['success' => getNotify(2)]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::where('id',$id)->first();
        if(!$service)abort(404);
        $service->delete();

        return redirect()->back()->with(['success' => getNotify(3)]);
    }

    public function makeInvoice(Request $request, $serviceId){
        $service = Service::join('customers','customers.id','=','services.customer_id')
                    ->where('services.id',$serviceId)
                    ->select('services.*')
                    ->first();
        if(!$service)abort(404);
        $serviceMans = lib_serviceMan();

        return view('frontend.pages.service.invoice',compact('service','serviceMans'));
    }

    public function complatedService(Request $request){
        $services = Service::join('users','users.id','=','services.repaired_by');

        $defaultFilter = true;

        if ($request->from != "" && $request->to != "") {
            $from = date('Y-m-d 00:00:00', strtotime($request->from));
            $to = date('Y-m-d 23:59:59', strtotime($request->to));
            $services = $services->whereBetween('services.created_at', [$from, $to]);
            $defaultFilter = false;
        }

        if ($request->service_type != "") {
            if($request->service_type=="paid"){
                $services = $services->where('services.due_amount', '=', '0');
                $defaultFilter = false;
            }
            if($request->service_type=="due"){
                $services = $services->where('services.due_amount', '>', '0');
                $defaultFilter = false;
            }
        }

        if ($request->serach_by != "" && $request->key != "") {
            $services = $services->where('services.'.$request->serach_by, 'like', '%' . $request->key . '%');
            $defaultFilter = false;
        }

        if($defaultFilter){
            $startOfMonth = date('Y-m-01 00:00:00');
            $endOfMonth = date('Y-m-t 23:59:59');
            $services = $services->whereBetween('services.created_at', [$startOfMonth, $endOfMonth]);
        }

        $services = $services->where('services.status','1');
        $services = $services->select('services.*','users.name as repaired_by')->orderBy('id','desc')->get();

        $users = lib_serviceMan();

        if($request->search_for == 'pdf'){
            $pdf = Pdf::loadView('pdf.services', compact('services','users','request'));
            return $pdf->download('Services.pdf');
        }

        return view('frontend.pages.service.complated',compact('services','users','request'));
    }

    public function makeComplate(Request $request, string $id){
        $service = Service::where('id',$id)->first();
        if(!$service)abort(404);
        $service->status = '1';
        $service->complated_date = date('Y-m-d');
        $service->update();

        return redirect()->back()->with(['success' => getNotify(2)]);
    } 

}
