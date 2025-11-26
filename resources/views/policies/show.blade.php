@extends('layouts.bootstrap')

@section('title', 'Policy Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Policy: {{ $policy->policy_number }}</h2>
    <a href="{{ route('policies.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header"><strong>Policy Information</strong></div>
            <div class="card-body">
                <p><strong>Policy Number:</strong> {{ $policy->policy_number }}</p>
                <p><strong>Type:</strong> {{ $policy->type }}</p>
                <p><strong>Status:</strong> <span class="badge bg-{{ $policy->status == 'Active' ? 'success' : ($policy->status == 'Expired' ? 'warning' : 'danger') }}">{{ $policy->status }}</span></p>
                <p><strong>Coverage Amount:</strong> ${{ number_format($policy->coverage_amount, 2) }}</p>
                <p><strong>Premium Amount:</strong> ${{ number_format($policy->premium_amount, 2) }}</p>
                <p><strong>Start Date:</strong> {{ $policy->start_date->format('d/m/Y') }}</p>
                <p><strong>End Date:</strong> {{ $policy->end_date->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header"><strong>Customer Information</strong></div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $policy->customer->name }}</p>
                <p><strong>Email:</strong> {{ $policy->customer->email }}</p>
                <p><strong>Phone:</strong> {{ $policy->customer->phone }}</p>
                <p><strong>Branch:</strong> {{ $policy->branch->name }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
