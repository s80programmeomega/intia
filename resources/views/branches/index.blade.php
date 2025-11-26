@extends('layouts.bootstrap')

@section('title', 'Branches')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Branches</h2>
    <a href="{{ route('branches.create') }}" class="btn btn-primary">Add Branch</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Customers</th>
                    <th>Policies</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($branches as $branch)
                <tr>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->location }}</td>
                    <td>{{ $branch->customers_count }}</td>
                    <td>{{ $branch->policies_count }}</td>
                    <td>
                        <a href="{{ route('branches.show', $branch) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('branches.edit', $branch) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('branches.destroy', $branch) }}" method="POST" class="d-inline">
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
