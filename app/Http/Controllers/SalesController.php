<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\User;
use App\Models\Product;
use Input;
use Validator;

class SalesController extends Controller
{
    public function index(Request $request)
    {

        $services = Sale::query();
        
        if ($request->from != "" && $request->to != "") {
            $services = $services->whereBetween('sales.created_at', [$request->from, $request->to]);
        }

        if ($request->serach_by != "" && $request->key != "") {
           $services = $services->where($request->serach_by, 'like', '%' . $request->key . '%');
        }

        if($request->from == "" && $request->to == "" && $request->serach_by == "" && $request->key == ""){
            $startOfDay = date('Y-m-d 00:00:00');
            $endOfDay = date('Y-m-d 23:59:59');
            $services = $services->whereBetween('sales.created_at', [$startOfDay, $endOfDay]);
        }

        $services = $services->orderBy('id','desc')->get();

        return view('frontend.pages.sales.index',compact('services','request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('status','1')->where('type','2')->get();
        return view('frontend.pages.sales.create',compact('products'));
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
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
        ];
        $validation = Validator::make($attributes, $rules);
        if ($validation->fails()) {
            return redirect()->back()->with(['error' => getNotify(4)])->withErrors($validation)->withInput();
        }

        if(!is_numeric($request->product_name)){
            $product = new Product;
            $product->name = $request->product_name;
            $product->type = '2';
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

        $service = new Sale;
        $service->customer_id = $customer->id;
        $service->name = $customer->name;
        $service->phone = $customer->phone;
        $service->email = $customer->email;
        $service->address = $customer->address;
        $service->product_name = $request->product_name;
        $service->price = $request->price;
        $service->qty = $request->qty;
        $service->bill = $request->price * $request->qty;
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
        $service = Sale::join('customers','customers.id','=','sales.customer_id')
                    ->where('sales.id',$id)
                    ->select('sales.*')
                    ->first();
        if(!$service)abort(404);
        $products = Product::where('status','1')->where('type','2')->get();

        return view('frontend.pages.sales.edit',compact('service','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Sale::where('id',$id)->first();
        if(!$service)abort(404);

        $attributes = $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required|numeric',
            'address' => 'nullable',
            'product_name' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
        ];
        $validation = Validator::make($attributes, $rules);
        if ($validation->fails()) {
            return redirect()->back()->with(['error' => getNotify(4)])->withErrors($validation)->withInput();
        }

        if(!is_numeric($request->product_name)){
            $product = new Product;
            $product->type = '2';
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
        $service->price = $request->price;
        $service->qty = $request->qty;
        $service->bill = $request->price * $request->qty;
        $service->save();

        return redirect()->back()->with(['success' => getNotify(2)]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Sale::where('id',$id)->first();
        if(!$service)abort(404);
        $service->delete();

        return redirect()->back()->with(['success' => getNotify(3)]);
    }

    public function makeInvoice(Request $request, $serviceId){
        $service = Sale::first();
        if(!$service)abort(404);

        return view('frontend.pages.sales.invoice',compact('service'));
    }
}