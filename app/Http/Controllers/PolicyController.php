<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\Customer;
use App\Models\Branch;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index()
    {
        $policies = Policy::with(['customer', 'branch'])->latest()->get();
        return view('policies.index', compact('policies'));
    }

    public function create()
    {
        $customers = Customer::all();
        $branches = Branch::all();
        return view('policies.create', compact('customers', 'branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'policy_number' => 'required|unique:policies',
            'customer_id' => 'required|exists:customers,id',
            'type' => 'required|in:Auto,Health,Life,Property',
            'coverage_amount' => 'required|numeric|min:0',
            'premium_amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:Active,Expired,Cancelled',
            'branch_id' => 'required|exists:branches,id',
        ]);

        Policy::create($request->all());
        return redirect()->route('policies.index')->with('success', 'Policy created successfully.');
    }

    public function show(Policy $policy)
    {
        $policy->load(['customer', 'branch']);
        return view('policies.show', compact('policy'));
    }

    public function edit(Policy $policy)
    {
        $customers = Customer::all();
        $branches = Branch::all();
        return view('policies.edit', compact('policy', 'customers', 'branches'));
    }

    public function update(Request $request, Policy $policy)
    {
        $request->validate([
            'policy_number' => 'required|unique:policies,policy_number,' . $policy->id,
            'customer_id' => 'required|exists:customers,id',
            'type' => 'required|in:Auto,Health,Life,Property',
            'coverage_amount' => 'required|numeric|min:0',
            'premium_amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:Active,Expired,Cancelled',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $policy->update($request->all());
        return redirect()->route('policies.index')->with('success', 'Policy updated successfully.');
    }

    public function destroy(Policy $policy)
    {
        $policy->delete();
        return redirect()->route('policies.index')->with('success', 'Policy deleted successfully.');
    }
}
