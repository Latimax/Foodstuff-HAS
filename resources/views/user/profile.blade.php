@extends('user.layouts.layout')

@section('title', 'User Profile')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">User Profile</h5>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $user->city }}</td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>{{ $user->state }}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{ $user->country }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ ucfirst($user->gender) }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ ucfirst($user->status) }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $user->updated_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{ ucfirst($user->role) }}</td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection