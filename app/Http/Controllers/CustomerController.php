<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Branch;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('branch')->latest()->get();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $branches = Branch::all();
        return view('customers.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'branch_id' => 'required|exists:branches,id',
        ]);

        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        $customer->load(['branch', 'policies']);
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $branches = Branch::all();
        return view('customers.edit', compact('customer', 'branches'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
