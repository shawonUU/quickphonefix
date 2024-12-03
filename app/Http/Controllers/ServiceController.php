<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Customer;
use App\Models\User;
use App\Models\Product;
use Input;
use Validator;

class ServiceController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $services = Service::join('customers','customers.id','=','services.customer_id')
                    ->select('services.*','customers.name','customers.phone','customers.email','customers.address');
        
        if ($request->from != "" && $request->to != "") {
            $services = $services->whereBetween('services.created_at', [$request->from, $request->to]);
        }

        // return $request->all();

        if ($request->serach_by != "" && $request->key != "") {
            // return "dhg";
           $services = $services->where($request->serach_by, 'like', '%' . $request->key . '%');
        }

        if($request->from == "" && $request->to == "" && $request->serach_by == "" && $request->key == ""){
           // $services = $services->whereBetween('services.created_at', [date('Y-m-d'), date('Y-m-d')]);
        }

        $services = $services->where('services.status','0');
        $services = $services->orderBy('id','desc')->get();

        $users = lib_serviceMan();
        return view('frontend.pages.service.index',compact('services','users','request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users  = User::get();
        $products = Product::where('status','1')->get();
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
            'address' => 'required',
            'product_name' => 'required',
            'product_number' => 'required',
            'details' => 'required',
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

        $service = new Service;
        $service->customer_id = $customer->id;
        $service->product_name = $request->product_name;
        $service->product_number = $request->product_number;
        $service->bill = $request->bill;
        $service->details = $request->details;
        $service->warranty_duration = $request->warranty_duration;
        $service->repaired_by = $request->repaired_by;
        $service->status = '0';
        $service->save();

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
                    ->select('services.*','customers.name','customers.phone','customers.email','customers.address')
                    ->first();
        if(!$service)abort(404);
        $products = Product::where('status','1')->get();
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
            'address' => 'required',
            'product_name' => 'required',
            'product_number' => 'required',
            'details' => 'required',
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
        $service->product_name = $request->product_name;
        $service->product_number = $request->product_number;
        $service->bill = $request->bill;
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
                    ->select('services.*','customers.name','customers.phone','customers.email','customers.address')
                    ->first();
        if(!$service)abort(404);
        $serviceMans = lib_serviceMan();

        return view('frontend.pages.service.invoice',compact('service','serviceMans'));
    }

    public function complatedService(Request $request){
        $services = Service::join('customers','customers.id','=','services.customer_id')
        ->select('services.*','customers.name','customers.phone','customers.email','customers.address');

        if ($request->from != "" && $request->to != "") {
            $services = $services->whereBetween('services.created_at', [$request->from, $request->to]);
        }

        if ($request->serach_by != "" && $request->key != "") {
            $services = $services->where($request->serach_by, 'like', '%' . $request->key . '%');
        }

        if($request->from == "" && $request->to == "" && $request->serach_by == "" && $request->key == ""){
            $startOfDay = date('Y-m-d 00:00:00');
            $endOfDay = date('Y-m-d 23:59:59');
            $services = $services->whereBetween('services.created_at', [$startOfDay, $endOfDay]);
        }

        $services = $services->where('services.status','1');
        $services = $services->orderBy('id','desc')->get();

        $users = lib_serviceMan();
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
