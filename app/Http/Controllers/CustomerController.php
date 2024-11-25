<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;

use App\Mail\VerificationMail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    public function signUpPage(){
        return view('frontend.pages.login');
    }

    public function loginPage(){
        return view('frontend.pages.login');
    }


    protected function customerSignUp(Request $request)
    {

        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'billing_first_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'billing_phone' => 'required|regex:/^[0-9]+$/',
            'password' => ['required', 'string', 'min:6'],
            'confirm_password' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['error' => getNotify(4)])->withErrors($validator)->withInput();
        }


        $data = $request->all();
        $role = Role::where('name', 'Customer')->first();
        $user = User::where('email', $data['email'])->first();
        if($user && $user->is_guest=='0'){
            return redirect()->back()->with(['error' => 'The email already exist.']);
        }
        else if($user && $user->is_guest=='1'){
            $user->name = $data['billing_first_name'];
            $user->email = $data['email'];
            $user->phone = $data['billing_phone'];
            $user->password = Hash::make($data['password']);
            $user->verification_code = rand(100000, 999999);
            $user->is_verified = false;
            $user->is_guest='0';
            $user->save();
        }else{
            $user = User::create([
                'name' => $data['billing_first_name'],
                'email' => $data['email'],
                'phone' => $data['billing_phone'],
                'password' => Hash::make($data['password']),
                'role_id' => $role->id,
                'is_verified' => false,
                'verification_code' => rand(100000, 999999),
            ]);
        }
        $user->assignRole($role);

        //Mail::to($user->email)->send(new VerificationMail($user->verification_code));

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) { 
            return redirect()->route('customer_profile');
        }
    }

    public function customerLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['error' => getNotify(4)])->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if($user && $user->is_guest == '1'){
            return redirect()->back()->with(['error' => 'Invalid credentials.']);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {  // Authentication passed...
            return redirect()->route('customer_profile');
        }
        return redirect()->back()->with(['error' => getNotify(4)]);
    }

    public function customerDeshboard(Request $request){
        return view('frontend.pages.deshboard');
    }

    public function getCustomerOrders()
    {
        $userId = auth()->user()->id;
        $orders = Order::where('customer_id', $userId)->where('is_order_valid',1)->orderBy('id', 'DESC')->get();
        return view('frontend.pages.customer_orders',compact('orders'));
    }

    public function getCustomerProfile(){
        return view('frontend.pages.customer_profile');
    }

    public function customerOrderView(Request $request, $order_number){
        $order = Order::where('order_number', $order_number)->first();
        if(!$order) abort(404);
        $items = OrderItem::where('order_number', $order_number)->get();
        $billing = Address::where('id',  $order->billing_address)->first();
        $shipping = Address::where('id',  $order->shipping_address)->first();
        $orderItems = OrderItem::where('order_number',$order->order_number)->get();
        $lib_districts = lib_districts();
        $lib_areas = lib_areas();

        return view('frontend.pages.customer_order_view', compact('order','items','shipping','billing','lib_districts','lib_areas'));
    }

    public function customerLogout(Request $request){
        Auth::logout();
        return redirect()->route('index');
    }

    public function sendVerificationMail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($request->type == "veryForForgot") {
            if ($user) {
                $user->verification_code = rand(100000, 999999);
                $user->update();
                Mail::to($user->email)->send(new VerificationMail($user->verification_code));
                $response = [
                    'success' => true,
                    'message' => 'Verification code sended',
                    'type' => 'forgotPassword'
                ];
                return response()->json($response);
            }
            $response = [
                'success' => false,
                'message' => 'Invalid Operation',
            ];
            return response()->json($response);
        } else {
            if ($user) {
                $user->verification_code = rand(100000, 999999);
                $user->update();
                Mail::to($user->email)->send(new VerificationMail($user->verification_code));
                $response = [
                    'success' => true,
                    'message' => 'Verification code sended',
                ];
                return response()->json($response);
            }
            $response = [
                'success' => false,
                'message' => 'Invalid Operation',
            ];
            return response()->json($response);
        }
    }

    public function verifyAccount(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if ($user->verification_code == $request->code) {
                    $user->is_verified = true;
                    $user->update();
                    $response = [
                        'success' => true,
                        'message' => 'Verified',
                        'user' => $user,
                    ];
                    return response()->json($response);
                } else {
                    Auth::logout();
                    $response = [
                        'success' => false,
                        'message' => 'Verification code is not matched',
                    ];
                    return response()->json($response);
                }
            }
        }
        $response = [
            'success' => false,
            'message' => 'Invalid Operation',
        ];
        return response()->json($response);
    }

    public function verifyAccountForgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->verification_code == $request->code) {
                $user->is_verified = true;
                $user->update();
                $response = [
                    'success' => true,
                    'message' => 'Verified',
                    'user' => $user,
                ];
                return response()->json($response);
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Verification code is not matched',
                ];
                return response()->json($response);
            }
        }
    }

    public function updateCustomerData(Request $request)
    {
        // Get current authenticated user
        // return $request->all();

        $user = auth()->user();
        $request->validate([
            'account_first_name' => 'required|string',
            'account_email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user = User::where('id', $user->id)->first();
        $user->name = $request->account_first_name;
        $user->email = $request->account_email;

        if($request->password_current != "" && $request->password != "" && $request->confirm_password != ""){
            if (!Hash::check($request->password_current, $user->password)) {
                return redirect()->back()->with(['error' => "Currect Password Is Incorrect."]);
            }
            if($request->password != $request->confirm_password){
                return redirect()->back()->with(['error' => "Confirm Passworn Not Metched."]);
            }
            $user->password = Hash::make($request->password);
        }
        $user->update();

        return redirect()->back()->with(['success' => "User Profile updated successfully."]);
    }

    public function verifyAndUpdateMail(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            if ($user->verification_code == $request->code) {
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->email = $request->email;
                $user->update();
                $response = [
                    'success' => true,
                    'message' => 'Verified',
                    'user' => $user,
                ];
                return response()->json($response);
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Verification code is not matched',
                ];
                return response()->json($response);
            }
        }
        $response = [
            'success' => false,
            'message' => 'Invalid Operation',
        ];
        return response()->json($response);
    }

    public function updatePassword(Request $request)
    {
        // Validate the request data
        $request->validate([
            'password' => 'required',
            'newPassword' => 'required|min:6',
            'confirmNewPassword' => 'required|same:newPassword',
        ]);
        $request->password . '-' . $request->newPassword . '-' . $request->confirmNewPassword;
        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the provided current password matches the one stored in the database
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Current password does not match.'], 401);
        }

        // Update the user's password
        $user->password = Hash::make($request->newPassword);
        $user->save();

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Password update success',
            'user' => $user,
        ]);
    }
    public function changePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'newPassword' => ['required', 'string', 'min:6'],
            'newConfirmPassword' => 'same:newPassword',
        ]);

        if ($validator->fails()) {
            $errors = implode('<br>', $validator->errors()->all());
            $response = [
                'success' => false,
                'message' => $errors,
            ];
            return response()->json($response);
        }

        $data = $request->all();
        $user = User::where('email', $request->email)->first();
        $user->password =  Hash::make($data['newPassword']);
        $user->update();
        $response = [
            'success' => true,
            'message' => 'Password forgot success',
        ];

        return response()->json($response);
    }


    public function submitContact(Request $request)
    {
        $data = $request->all();
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string'
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Handle the form submission logic (e.g., save to database, send email)
        // For demonstration, we'll just return the validated data
        Mail::to('mdsajibhassan01993@gmail.com')->send(new ContactFormMail($data));
        return response()->json([
            'message' => 'Form submitted successfully!',
            'data' => $request->all()
        ], 200);
    }
}
