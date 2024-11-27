<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Customer;
use App\Models\User;
use Input;
use Validator;

class ServiceController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::join('customers','customers.id','=','services.customer_id')
                    ->select('services.*','customers.name','customers.phone','customers.email','customers.address')
                    ->get();
        $users = lib_serviceMan();
        return view('frontend.pages.service.index',compact('services','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users  = User::get();
        return view('frontend.pages.service.create',compact('users'));
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
        $service->save();

        return redirect()->back()->with(['success' => getNotify(1)]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
}
