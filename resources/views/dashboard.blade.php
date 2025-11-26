@extends('layouts.bootstrap')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Welcome to Intia Insurance</h2>
        <p class="text-muted">Manage your branches, customers, and policies efficiently.</p>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Branches</h5>
                <p class="card-text fs-3">{{ \App\Models\Branch::count() }}</p>
                <a href="{{ route('branches.index') }}" class="btn btn-light btn-sm">View All</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Customers</h5>
                <p class="card-text fs-3">{{ \App\Models\Customer::count() }}</p>
                <a href="{{ route('customers.index') }}" class="btn btn-light btn-sm">View All</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Policies</h5>
                <p class="card-text fs-3">{{ \App\Models\Policy::count() }}</p>
                <a href="{{ route('policies.index') }}" class="btn btn-light btn-sm">View All</a>
            </div>
        </div>
    </div>
</div>
@endsection
