@extends('layouts.bootstrap')

@section('title', 'Create Policy')

@section('content')
<h2>Create Policy</h2>

<div class="card">
    <div class="card-body">
        <form action="{{ route('policies.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Policy Number</label>
                    <input type="text" name="policy_number" class="form-control @error('policy_number') is-invalid @enderror" value="{{ old('policy_number') }}" required>
                    @error('policy_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Customer</label>
                    <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror" required>
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    @error('customer_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                        <option value="">Select Type</option>
                        <option value="Auto" {{ old('type') == 'Auto' ? 'selected' : '' }}>Auto</option>
                        <option value="Health" {{ old('type') == 'Health' ? 'selected' : '' }}>Health</option>
                        <option value="Life" {{ old('type') == 'Life' ? 'selected' : '' }}>Life</option>
                        <option value="Property" {{ old('type') == 'Property' ? 'selected' : '' }}>Property</option>
                    </select>
                    @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Branch</label>
                    <select name="branch_id" class="form-select @error('branch_id') is-invalid @enderror" required>
                        <option value="">Select Branch</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                        @endforeach
                    </select>
                    @error('branch_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Coverage Amount</label>
                    <input type="number" step="0.01" name="coverage_amount" class="form-control @error('coverage_amount') is-invalid @enderror" value="{{ old('coverage_amount') }}" required>
                    @error('coverage_amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Premium Amount</label>
                    <input type="number" step="0.01" name="premium_amount" class="form-control @error('premium_amount') is-invalid @enderror" value="{{ old('premium_amount') }}" required>
                    @error('premium_amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
                    @error('start_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" required>
                    @error('end_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Expired" {{ old('status') == 'Expired' ? 'selected' : '' }}>Expired</option>
                        <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('policies.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
