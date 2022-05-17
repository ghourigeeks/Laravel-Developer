<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index',compact('customers'));
    }



    public function create()
    {
        return view('customers.create');
    }



    public function store(CustomerRequest $request)
    {
        $validated    = $request->validated();
        $customer         = Customer::create($request->all());
        return response()->json(['success'=>$request['name']. ' create successfully.']);
    }


    public function show($id)
    {
        $customers = Customer::findorFail($id);
        return view('customers.show',compact('customers'));
    }


    
    public function edit($id)
    {
        $customer  = Customer::findorFail($id);
        return view('customers.edit',compact('customer'));
    }
    

    
    public function update(CustomerRequest $request, Customer $customer)
    {

        $validated  = $request->validated();
        $customer->update($request->all());

        if(!(isset($input['active']))){
            $input['active'] = 0;
        }
    
        return response()->json(['success'=>$request['name']. ' updated successfully.']);
    }



    public function destroy(Customer $customer)
    {
          $customer->delete();
          return redirect()->route('customers.index')
                        ->with(['success'=>$customer['name'].' deleted successfully']);
    }

}
