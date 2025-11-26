@extends('layouts.bootstrap')

@section('title', 'Edit Branch')

@section('content')
<h2>Edit Branch</h2>

<div class="card">
    <div class="card-body">
        <form action="{{ route('branches.update', $branch) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $branch->name) }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $branch->location) }}" required>
                @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('branches.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
