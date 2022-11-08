<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Province;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        if($request->filled('search')) {
//            $customers = Customer::search($request->search)->get();
//        } else {
//            $customers = Customer::get();
//        }
//        return view('customers.index', compact('customers'));

        $search = $request->input('search');
        if($search != '') {
            $customers = Customer::where('firstname', 'LIKE', '%{$search}%')
                ->orWhere('lastname', 'LIKE', '%{$search}%')
                ->orWhere('phone_number', 'LIKE', '%{$search}%')->get();
        } else {
            $customers = Customer::latest()->paginate(50);
        }
        return view('customers.index', ['customers' => $customers]);

//        $customers = Customer::latest()->paginate(50);
//        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        return view('customers.create', ['provinces' => $provinces]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'firstname' => 'alpha',
            'lastname' => 'alpha',
            'phone_number' => 'required|unique:customers',
            'email' => 'unique:customers',
        ]);
        $customer = new Customer();
        $customer->firstname = $request->input('firstname');
        $customer->lastname = $request->input('lastname');
        $customer->address = $request->input('address');
        $customer->province_id = $request->input('province');
        $customer->postal_code = $request->input('postal_code');
        $customer->phone_number = $request->input('phone_number');
        if($request->has('email')){
            $customer->email = $request->input('email');
        } else {
            $customer->email = null;
        }
        $customer->save();
        return redirect()->route('customers.index')->with('status', 'Customer Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Customer $customer)
    {
        $provinces = Province::all();

        return view('customers.edit', ['customer' => $customer, 'provinces' => $provinces]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'firstname' => 'alpha',
            'lastname' => 'alpha',
            'phone_number' => 'required|unique:customers',
            'email' => 'unique:customers',
        ]);
        $customer->firstname = $request->input('firstname');
        $customer->lastname = $request->input('lastname');
        $customer->address = $request->input('address');
        $customer->province_id = $request->input('province');
        $customer->postal_code = $request->input('postal_code');
        $customer->phone_number = $request->input('phone_number');
        if($request->has('email')){
            $customer->email = $request->input('email');
        } else {
            $customer->email = null;
        }
        $customer->save();

        return redirect()->route('customers.show', ['customer' => $customer->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request) {
        $search = $request->input('search');

        $customers = Customer::where('firstname', 'LIKE', '%{$search}%')
            ->orWhere('lastname', 'LIKE', '%{$search}%')
            ->orWhere('phone_number', 'LIKE', '%{$search}%')->get();

        return view('customers.index', compact('customers'));
    }
}
