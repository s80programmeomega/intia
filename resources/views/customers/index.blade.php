@extends('layouts.bootstrap')

@section('title', 'Customers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Customers</h2>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Branch</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->branch->name }}</td>
                    <td>
                        <a href="{{ route('customers.show', $customer) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline">
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
