@extends('layouts.bootstrap')

@section('title', 'Branch Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>{{ $branch->name }}</h2>
    <a href="{{ route('branches.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card mb-3">
    <div class="card-body">
        <p><strong>Location:</strong> {{ $branch->location }}</p>
        <p><strong>Total Customers:</strong> {{ $branch->customers->count() }}</p>
        <p><strong>Total Policies:</strong> {{ $branch->policies->count() }}</p>
    </div>
</div>
@endsection
