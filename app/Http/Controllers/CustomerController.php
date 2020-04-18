<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }

    public function index()
    {
        $customers = \Stripe\Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(CustomerStoreRequest $request)
    {
        $requestData = $request->all();
        $requestData['password'] = bcrypt($request->password);
        User::create($requestData);
        $user = User::where('email', $request->email)->first();
        \Stripe\Customer::create([
            'id' => $user['id'],
            'email' => $request['email'],
            'description' => $request['name'],
        ]);
        return redirect()->route('customers.index')->with('success', 'Customer Added Successfully');
    }

    public function show($id)
    {
        try {
            $customer = \Stripe\Customer::retrieve($id);
            return view('customers.show', compact('customer'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid Customer Request!');
        }
    }

    public function edit($id)
    {
        try {
            $customer = \Stripe\Customer::retrieve($id);
            return view('customers.edit', compact('customer'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid Customer Request!');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            \Stripe\Customer::update(
                $id,
                [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'description' => $request->description,
                    'address' => ['line1'=>$request->line1],
                    'shipping'=>['address' => ['line1'=>$request->line1],'name'=>$request->shipping_name],
                    // 'metadata' => ['order_id' => '6735'],
                ]
            );
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There are Some Errors!');
        }
        return redirect()->route('customers.show',$id)->with('success','Customer Data Updated Successfully!');
    }

    public function destroy($id)
    {
        try {
            $customer = \Stripe\Customer::retrieve($id);
            $customer->delete();
            User::findOrFail($id)->delete();
            return redirect()->route('customers.index')->with('success', 'Customer Deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Unable To Delete This Customer');
        }
    }
}
