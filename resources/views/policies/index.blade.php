@extends('layouts.bootstrap')

@section('title', 'Policies')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Policies</h2>
    <a href="{{ route('policies.create') }}" class="btn btn-primary">Add Policy</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Policy Number</th>
                    <th>Customer</th>
                    <th>Type</th>
                    <th>Premium</th>
                    <th>Status</th>
                    <th>Branch</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($policies as $policy)
                <tr>
                    <td>{{ $policy->policy_number }}</td>
                    <td>{{ $policy->customer->name }}</td>
                    <td>{{ $policy->type }}</td>
                    <td>${{ number_format($policy->premium_amount, 2) }}</td>
                    <td><span class="badge bg-{{ $policy->status == 'Active' ? 'success' : ($policy->status == 'Expired' ? 'warning' : 'danger') }}">{{ $policy->status }}</span></td>
                    <td>{{ $policy->branch->name }}</td>
                    <td>
                        <a href="{{ route('policies.show', $policy) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('policies.edit', $policy) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('policies.destroy', $policy) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
