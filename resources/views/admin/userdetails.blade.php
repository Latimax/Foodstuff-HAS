@extends('admin.layouts.layout')

@section('title', 'Admin | User Details')

@section('content')
    <div class="row">
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">User Details</h5>
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Display User Information in Form Fields -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label fw-semibold">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $user->phone ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label fw-semibold">City</label>
                            <input type="text" class="form-control" id="city" name="city"
                                value="{{ $user->city ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="state" class="form-label fw-semibold">State</label>
                            <input type="text" class="form-control" id="state" name="state"
                                value="{{ $user->state ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label fw-semibold">Country</label>
                            <input type="text" class="form-control" id="country" name="country"
                                value="{{ $user->country ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label fw-semibold">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>

                        <!-- Update Button -->
                        <button type="submit" class="btn btn-primary">Update</button>

                        <!-- Enable/Disable and Delete User Options -->
                        <a href="{{ route('admin.users.toggleStatus', $user->id) }}"
                            class="btn {{ $user->status == 'inactive' ? 'btn-success' : 'btn-warning' }}">
                            {{ $user->status == 'inactive' ? 'Enable' : 'Disable' }} User
                        </a>

                        <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                            Delete User
                        </a>

                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary"> Go Back </a>
                   
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
