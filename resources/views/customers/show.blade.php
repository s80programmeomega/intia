@extends('layouts.bootstrap')

@section('title', 'Customer Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>{{ $customer->name }}</h2>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card mb-3">
    <div class="card-body">
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Phone:</strong> {{ $customer->phone }}</p>
        <p><strong>Address:</strong> {{ $customer->address }}</p>
        <p><strong>Date of Birth:</strong> {{ $customer->date_of_birth->format('d/m/Y') }}</p>
        <p><strong>Branch:</strong> {{ $customer->branch->name }}</p>
    </div>
</div>

<h4>Policies ({{ $customer->policies->count() }})</h4>
<div class="card">
    <div class="card-body">
        @if($customer->policies->count() > 0)
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Policy Number</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Premium</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer->policies as $policy)
                    <tr>
                        <td>{{ $policy->policy_number }}</td>
                        <td>{{ $policy->type }}</td>
                        <td><span class="badge bg-{{ $policy->status == 'Active' ? 'success' : 'secondary' }}">{{ $policy->status }}</span></td>
                        <td>${{ number_format($policy->premium_amount, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">No policies found.</p>
        @endif
    </div>
</div>
@endsection
